// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console) {
    arguments.callee = arguments.callee.caller;
    var newarr = [].slice.call(arguments);
    (typeof console.log === 'object' ? log.apply.call(console.log, console, newarr) : console.log.apply(console, newarr));
  }
};

// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,clear,count,debug,dir,dirxml,error,exception,firebug,group,groupCollapsed,groupEnd,info,log,memoryProfile,memoryProfileEnd,profile,profileEnd,table,time,timeEnd,timeStamp,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());



var $ = jQuery.noConflict();


$(document).ready(function () {


		$('.repeatable-add').click(function() {  
			console.log('add clicked');
	
		    field = $(this).closest('td').find('.custom_repeatable li:last').clone(true);  
		    fieldLocation = $(this).closest('td').find('.custom_repeatable li:last');  
		    $('input', field).val('').attr('name', function(index, name) {  
		        return name.replace(/(\d+)/, function(fullMatch, n) {  
		            return Number(n) + 1;  
		        });  
		    })  
		    field.insertAfter(fieldLocation, $(this).closest('td'))  
		    return false;  
		});  
  
		$('.repeatable-remove').click(function(){  
			console.log('remove clicked');
		    $(this).parent().remove();  
		    return false;  
		});  
      
		$('.custom_repeatable').sortable({  
			    opacity: 0.6,  
			    revert: true,  
			    cursor: 'move',  
			    handle: '.sort'  
			});


});