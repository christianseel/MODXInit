/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *	_helper.js
 *  contains small bug fixes or polyfills or new feature
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */


// Lighweight wrapper for console.log
// via http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
    log.history = log.history || [];   // store logs to an array for reference
    log.history.push(arguments);
    if(window.console){
        console.log( Array.prototype.slice.call(arguments) );
    }
};



// Date.now polyfill
if (!Date.now) {
    Date.now = function() { return new Date().getTime(); };
}

window.getTimestamp = function(){
    return moment.unix();
};


// set and get objects from localStorage
// via http://stackoverflow.com/a/3146971
Storage.prototype.setObject = function(key, value) {
    this.setItem(key, JSON.stringify(value));
};

Storage.prototype.getObject = function(key) {
    var value = this.getItem(key);
    return value && JSON.parse(value);
};