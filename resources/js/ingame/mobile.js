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
                y: window.scrollY || window.pageYOffset || 0,
                activeElement: getActiveElementSnapshot(),
                listPositions: getListPositions()
            }));
        } catch (error) {
            // Storage can be unavailable in private browsing contexts.
        }
    }

    function getActiveElementSnapshot() {
        var active = document.activeElement;
        if (!active || active === document.body) {
            return null;
        }

        var snapshot = {
            id: active.id || '',
            name: active.getAttribute ? active.getAttribute('name') : '',
            tagName: active.tagName ? active.tagName.toLowerCase() : ''
        };

        if (active instanceof HTMLInputElement || active instanceof HTMLTextAreaElement) {
            snapshot.selectionStart = active.selectionStart;
            snapshot.selectionEnd = active.selectionEnd;
        }

        return snapshot;
    }

    function getListPositions() {
        var positions = {};
        document.querySelectorAll('[data-mobile-scroll-key]').forEach(function (element) {
            positions[element.getAttribute('data-mobile-scroll-key')] = {
                left: element.scrollLeft,
                top: element.scrollTop
            };
        });
        return positions;
    }

    function restoreActiveElement(snapshot) {
        if (!snapshot) {
            return;
        }

        var selector = snapshot.id
            ? '#' + snapshot.id
            : snapshot.name
                ? snapshot.tagName + '[name="' + snapshot.name.replace(/"/g, '\\"') + '"]'
                : null;

        if (!selector) {
            return;
        }

        var active = document.querySelector(selector);
        if (!active || typeof active.focus !== 'function') {
            return;
        }

        active.focus({preventScroll: true});
        if (typeof snapshot.selectionStart === 'number' &&
            typeof active.setSelectionRange === 'function') {
            active.setSelectionRange(snapshot.selectionStart, snapshot.selectionEnd);
        }
    }

    function restoreListPositions(positions) {
        if (!positions) {
            return;
        }

        Object.keys(positions).forEach(function (key) {
            var element = document.querySelector('[data-mobile-scroll-key="' + key.replace(/"/g, '\\"') + '"]');
            if (!element) {
                return;
            }

            element.scrollLeft = positions[key].left || 0;
            element.scrollTop = positions[key].top || 0;
        });
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
                restoreListPositions(position.listPositions);
                restoreActiveElement(position.activeElement);
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
