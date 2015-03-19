// import "_helper.js";
// import "_modernizr.js";


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *	init Foundation Components
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$(document).foundation();




/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *	jQuery
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$(function(){
    
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     *	fix half pixel transforms in webkit where needed
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    
    	window.transformFix = function transformFix(){
    		$('.transformfix').each(function(){
    			$(this).css("-webkit-transform", '');
    			var matrix = $(this).css("-webkit-transform");
    			//log(matrix);
    			if (matrix && matrix != 'none') {
        			// get each value in an array
        			matrix = matrix.match(/\(([^)]+)\)/)[1].split(',');
        			// trim and round each value
        			$.each(matrix, function(i,item){
            			item = item.replace(/^\s+|\s+$/g, '');
            			matrix[i] = Math.round(item);
        			});
    				
    				// create new matrix
    				var newMatrix = 'matrix('+ matrix.join() +')';
    				//log(newMatrix);
    				$(this).css("-webkit-transform",newMatrix);
    			}
    		});
    	};
    	
    	// re-run function on resize
    	$(window).on('resize', Foundation.utils.throttle(function(e){
    		transformFix();
    	}, 500));
    	
    	// fire function on 1st page load
    	transformFix();
    
    
    
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     *	add data-equalizer-watch attribute to children
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    	var eq_i = $('[data-equalizer]').length;
    
    	$('[data-equalizer]').each(function(index, wrapper){
    		eq_i--;
    		
    		if (!$(wrapper).find('[data-equalizer-watch]').length) {
    			$(wrapper).find('> *').each(function(index,item){
    				$(item).attr('data-equalizer-watch', true);
    			});
    		}
    		
    		if (eq_i === 0) setTimeout(function(){
    			$(document).foundation('equalizer', 'reflow');
    		},100);
    	});
    	
    	// reflow equalizer on resize (throttled)
    	$(window).on('resize', Foundation.utils.throttle(function(e){
    		$(document).foundation('equalizer', 'reflow');
    	}, 1000));
    
});
