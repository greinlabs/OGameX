var TimerHandler = function (d, c) {
    if (typeof(d) == "undefined") {
        d = 1000
    }
    this._interval = d;
    this._callbacks = new Array();
    this._intervalId = null;
    this._lastId = 0;
    this.pageReloadAlreadyTriggered = false;
    this.checkEventsAlreadyQueued = false;
    this._visibilityPaused = false;
    var instance = this;
    if (typeof document !== 'undefined') {
        document.addEventListener('visibilitychange', function () {
            if (document.visibilityState === 'hidden') {
                instance._visibilityPaused = true;
                instance.stopTimer();
            } else if (instance._visibilityPaused) {
                instance._visibilityPaused = false;
                instance.startTimer();
            }
        });
    }
    if (c != false) {
        this.startTimer()
    }
};
TimerHandler.prototype.appendCallback = function (c) {
    var d = this._lastId++;
    this._callbacks[d] = c;
    return d
};
TimerHandler.prototype.removeCallback = function (b) {
    this._callbacks[b] = null
};
TimerHandler.prototype.startTimer = function () {
    var b = this;
    if (typeof document !== 'undefined' && document.visibilityState === 'hidden') {
        return;
    }
    if (b._intervalId !== null) {
        window.clearInterval(b._intervalId);
    }
    this._intervalId = window.setInterval(function () {
        b._timer()
    }, this._interval)
};
TimerHandler.prototype.stopTimer = function () {
    if (this._intervalId !== null) {
        window.clearInterval(this._intervalId);
        this._intervalId = null;
    }
};
TimerHandler.prototype._timer = function () {
    for (var b in this._callbacks) {
        if (this._callbacks[b] != null) {
            this._callbacks[b]()
        }
    }
};