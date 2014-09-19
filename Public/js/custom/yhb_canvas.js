;(function ( $, window, document, undefined ) {

    var pluginName = 'yhb_canvas',
        plugin,
        defaults = {
            callback: function(str) {}
        },
        $this,
        prev_top = false,
        prev_left = false;

    // The actual plugin constructor
    function Plugin( element, options ) {
        plugin = this;
        this.element = element;
        this.options = $.extend( {}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype.init = function () {
        this.canvasDroppable();
        this.initCustomEventHandler();
    };


    Plugin.prototype.canvasDroppable = function() {
        $this = $(this.element);
        $this.droppable({
            //accept: ".square_btn",
            drop: function(event, ui) {
                $("#"+ui.draggable.attr('id')).trigger("dropped", ui);
            }
        });
    }

    Plugin.prototype.initCustomEventHandler = function() {
        $this.on("dragging", function(event, top, left, width, height) {
            var tmpGridSize = YHB.gridSize;
            var top_ = Math.round(top/tmpGridSize)*tmpGridSize,
                left_ = Math.round(left/tmpGridSize)*tmpGridSize; 
            // only when top or left is changed more than 1 grid, then update shadow
            if(prev_top != top_ || prev_left != left_) {
                prev_top = top_;
                prev_left = left_;
                //plugin.options.callback("w:"+width+" h:"+height+" top:"+top_+" left:"+left_+" this:"+($this.attr("id")));
                // remove all highlights and then add new
                $(".highlights").remove();
                $("<div class='highlights'></div>").css({"width":width, "height":height, "background-color":"#ccc", "top":top_, "left":left_, "position":"absolute"}).appendTo($this);;
            }

            // handle height auto increase problem
            //if(top+n_grid_h*YHB.gridSize > $this.height()) {
            //    $this.height(top+(n_grid_h+1)*YHB.gridSize)
            //    $this.parent().getNiceScroll().resize();
            //    $this.parent().scrollTop($this.height());
            //}
            ////$this.parent().getNiceScroll().resize();
        });

        $this.on("dragStopped", function(){
            // reset prev value, which will let first dragging event show highlight
            prev_top = false;
            prev_left = false;
            $(".highlights").remove();
        });
    }


    // public methods are defined here, only top level methods should be here
    // if can be handled in each component(plugin), it should be handled there.

    $.fn.reset = Plugin.prototype.reset = function() {
        // TODO: clean all com(ponents) on the canvas
    }

    $.fn.save = Plugin.prototype.save = function() {
        // TODO: save all coms on the canvas
        //alert($this.children(".component").outerHTML());
        $this.children(".component").trigger("save");
        //$("#com0").trigger("save");
    }



    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, pluginName)) {
                $.data(this, pluginName, 
                new Plugin( this, options ));
            }
        });
    }

})( jQuery, window, document );