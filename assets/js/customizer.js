// customize-control-rh_slide_1_control

;(function () {
	wp.customize.bind('ready', function () {
        // include the id you use when you create the control
		wp.customize.control('rh_slide_count_control', function (control) {
		// 	/**
		// 	 * Run function on setting change of control.
		// 	 */
			control.setting.bind(function (value) {
				console.log('hellvzxcvcxvo');
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
