var postSelectControl = elementor.modules.controls.BaseData.extend({ 

    onReady: function() {

        this.control_select = this.$el.find('.post-select');
        this.save_input = this.$el.find('.post-select-save-value');

        this.control_select.select2({
            ajax: {
                url: 'http://videoelementorcontrols.local/wp-admin/admin-ajax.php?action=get_posts',
                dataType: 'json',
                processResults: function(data){
                    return {
                        results: data
                    }
                }
            }
        });

        this.control_select.on('change', () => {
            this.saveValue();
        } )

    },

    saveValue: function() {
        this.setValue(this.control_select.val());
    },

    onBeforeDestroy: function() {

        this.saveValue();

    }

});

elementor.addControlView( 'wpc-post-select', postSelectControl );
