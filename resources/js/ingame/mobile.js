(function () {
    'use strict';

    var mobileQuery = window.matchMedia('(max-width: 767px)');
    var scrollKeyPrefix = 'ogamex-mobile-scroll:';

    function isMobile() {
        return mobileQuery.matches;
    }

    function getScrollKey() {
        return scrollKeyPrefix + window.location.pathname + window.location.search;
    }

    function saveScrollPosition() {
        if (!isMobile()) {
            return;
        }

        try {
            sessionStorage.setItem(getScrollKey(), JSON.stringify({
                x: window.scrollX || window.pageXOffset || 0,
                y: window.scrollY || window.pageYOffset || 0
            }));
        } catch (error) {
            // Storage can be unavailable in private browsing contexts.
        }
    }

    function restoreScrollPosition() {
        if (!isMobile()) {
            return;
        }

        try {
            var saved = sessionStorage.getItem(getScrollKey());
            if (!saved) {
                return;
            }

            var position = JSON.parse(saved);
            window.requestAnimationFrame(function () {
                window.scrollTo(position.x || 0, position.y || 0);
            });
        } catch (error) {
            // Invalid or unavailable session storage should not block rendering.
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        restoreScrollPosition();

        if ('scrollRestoration' in window.history) {
            window.history.scrollRestoration = 'manual';
        }

        window.addEventListener('pagehide', saveScrollPosition);
        window.addEventListener('beforeunload', saveScrollPosition);
        window.addEventListener('resize', saveScrollPosition);
    });

    window.addEventListener('pageshow', function () {
        restoreScrollPosition();
    });

    var scrollSaveTimer = null;
    window.addEventListener('scroll', function () {
        if (!isMobile()) {
            return;
        }

        window.clearTimeout(scrollSaveTimer);
        scrollSaveTimer = window.setTimeout(saveScrollPosition, 150);
    }, {passive: true});

    document.addEventListener('visibilitychange', function () {
        if (document.visibilityState === 'hidden') {
            saveScrollPosition();
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        var indicator = document.createElement('div');
        indicator.id = 'mobileLoadingIndicator';
        indicator.className = 'mobileLoadingIndicator';
        indicator.setAttribute('role', 'status');
        indicator.setAttribute('aria-live', 'polite');
        document.body.appendChild(indicator);
    });

    if (window.jQuery) {
        window.jQuery(document).ajaxSend(function () {
            if (!isMobile()) {
                return;
            }

            document.body.classList.add('mobileLoading');
        });

        window.jQuery(document).ajaxComplete(function () {
            if (!isMobile()) {
                return;
            }

            document.body.classList.remove('mobileLoading');
        });
    }
})();
