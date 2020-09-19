<!--<script type="text/javascript" src="<?php echo base_url (THEME_PATH. 'assets/js/vendor/jquery-sortable.js'); ?>"></script>-->

<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

<script type="text/javascript">	

	Sortable.create(simpleList, { 
		animation: 150,
		group: 'sorat',		
		store: {			
			get: function (sortable) {
				//var order = localStorage.getItem(sortable.options.group.name);
				//return order ? order.split('|') : [];
			},			
			set: function (sortable) {
				var order_array = sortable.toArray();
			    var order = JSON.stringify(order_array);

				fetch ('<?php echo site_url ('coaching/courses_actions/save_order/'.$coaching_id.'/'.$course_id); ?>', {
			    	method: 'POST',
			    	body: order,
			   }).then (function (response) {
					return response.json ();
				}).then(function(result) {
					if (result.status == true) {
					}
				});

				//alert (order);
				//localStorage.setItem(sortable.options.group.name, order.join('|'));
			}
		}
	});

	/*
			$("ul.sortable").sortable({
			});
	var group = $("ul.sortable").sortable({
	  group: 'serialization',
	  delay: 500,
	  onDrop: function ($item, container, _super) {
	    var data = group.sortable("serialize").get(0);
	    var jsonString = JSON.stringify(data);

	    _super($item, container); 

	    fetch ('<?php echo base_url ('coaching/lesson_actions/organize/'.$coaching_id.'/'.$course_id.'/'.$batch_id); ?>', {
	    	method: 'POST',
	    	body: jsonString,
	    });

	  }
	});

	var adjustment;

	$("ol.simple_with_animation").sortable({
	  group: 'simple_with_animation',
	  pullPlaceholder: false,
	  // animation on drop
	  onDrop: function  ($item, container, _super) {
	    var $clonedItem = $('<li/>').css({height: 0});
	    $item.before($clonedItem);
	    $clonedItem.animate({'height': $item.height()});

	    $item.animate($clonedItem.position(), function  () {
	      $clonedItem.detach();
	      _super($item, container);
	    });

	    var data = group.sortable("serialize").get(0);
	    var jsonString = JSON.stringify(data);

	    _super($item, container); 

	    fetch ('<?php echo base_url ('coaching/lesson_actions/organize/'.$coaching_id.'/'.$course_id.'/'.$batch_id); ?>', {
	    	method: 'POST',
	    	body: jsonString,
	    });

	  },

	  // set $item relative to cursor position
	  onDragStart: function ($item, container, _super) {
	    var offset = $item.offset(),
	        pointer = container.rootGroup.pointer;

	    adjustment = {
	      left: pointer.left - offset.left,
	      top: pointer.top - offset.top
	    };

	    _super($item, container);
	  },
	  onDrag: function ($item, position) {
	    $item.css({
	      left: position.left - adjustment.left,
	      top: position.top - adjustment.top
	    });
	  }
	});

	$('.switch_demo').on ('change', function () {
		
		if ($(this).is(':checked')) {
			var data = 1;
		} else {
			var data = 0;			
		}

		var id = $(this).attr ('data-id');
		
		fetch ('<?php echo site_url ('coaching/courses_actions/mark_for_demo'); ?>/'+id+'/'+data, {
			method: 'POST',
		}).then (function (response){
			return response.json ();
		}).then (function (result) {

		});
	});
	*/
</script>