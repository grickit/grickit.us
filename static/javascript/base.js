$(document).ready(function() {
  var baseCharset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/';

  function convert() {
    var fromString = $('#fromText').val();
    var toString = '';
    var fromCharset = $('#fromCharset').val();
    var toCharset = $('#toCharset').val();
    var fromBase = $('#fromBase').val();
    var toBase = $('#toBase').val();

    fromCharset = fromCharset.substring(0,fromBase);
    toCharset = toCharset.substring(0,toBase);

    $('.has-warning').removeClass('has-warning');
    $('.has-error').removeClass('has-error');

    if(fromBase > fromCharset.length) {
      $('#fromBase-group').addClass('has-error');
      $('#toText-group').addClass('has-warning');
      return 'Not enough characters in the starting character set.';
    }
    if(toBase > toCharset.length) {
      $('#toBase-group').addClass('has-error');
      $('#toText-group').addClass('has-warning');
      return 'Not enough characters in the result character set.';
    }
    if(fromBase <= 1) {
      $('#fromBase-group').addClass('has-error');
      $('#toText-group').addClass('has-warning');
      return 'Starting base too small.';
    }
    if(toBase <= 1) {
      $('#toBase-group').addClass('has-error');
      $('#toText-group').addClass('has-warning');
      return 'Result base too small.';
    }
    for(var index = 0; index < fromString.length; index++) {
      if(fromCharset.indexOf(fromString[index]) === -1) {
        $('#fromText-group').addClass('has-error');
        $('#toText-group').addClass('has-warning');
        return 'Character "'+fromString[index]+'" not in base character set.';
      }
    }

    // Convert to base10 first
    var temp = fromString;
    var number = 0;
    var multiplier = 1;
    while(temp.length > 0) {
      number += multiplier*fromCharset.indexOf(temp.charAt(temp.length -1)); // Add the base10 value of the last character
      temp = temp.substring(0,temp.length -1); // Chop off the last character
      multiplier *= fromBase; // Compound the multiplier
    }

    // Convert to result base next
    var temp = number;
    var result = '';
    while (temp >= toBase) {
      toString = toCharset.charAt(temp%toBase)+toString;
      temp /= toBase; // Divide by the base
    }
    toString = toCharset.charAt(temp)+toString;

    // Show the result
    return toString;
  }


  $('#resetFromCharset').on('click',function() { $('#fromCharset').val(baseCharset); });

  $('#resetToCharset').on('click',function() { $('#toCharset').val(baseCharset); });

  $('#convert').on('click',function() { $('#toText').val(convert()); });
});