// This autocompleter acts just like the script.aculo.us Autocompleter.Local,
// except that it doesn't try to consume the tab key.
var MyAutocompleter = Class.create();
Object.extend(MyAutocompleter.prototype, Autocompleter.Local.prototype);
Object.extend(MyAutocompleter.prototype, {
  superOnKeyPress: Autocompleter.Local.prototype.onKeyPress,
  onKeyPress: function(event) {
    return event.keyCode == Event.KEY_TAB ?
      true :
      this.superOnKeyPress(event);
  }
});