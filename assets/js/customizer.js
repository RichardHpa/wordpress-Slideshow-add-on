;(function () {
	wp.customize.bind('ready', function () {
		for (var i = 1; i <= 10; i++) {
			$(`#customize-control-rh_slide_${i}_control`).hide();
			if(i <= post_counts['count']){
				$(`#customize-control-rh_slide_${i}_control`).show();
			}
		}

        // include the id you use when you create the control
		wp.customize.control('rh_slide_count_control', function (control) {
			control.setting.transport = 'refresh';
		// 	/**
		// 	 * Run function on setting change of control.
		// 	 */
			control.setting.bind(function (value) {
                for (var i = 1; i <= 10; i++) {
                    $(`#customize-control-rh_slide_${i}_control`).hide();
                    if(i <= value){
                        $(`#customize-control-rh_slide_${i}_control`).show();
                    }
                }

			});
		});
	});
})();
