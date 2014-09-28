;(function ( $, window, document, undefined ) {

    //此处的变量将被所有的插件的实例共用，所以此处变量仅限于共用变量
    var pluginName = 'yhb_utility',
        defaults = {
            componentName: "",
            canvasId: "canvas",
            editorId:"editor-edit-id",
            resourcePanelId: "resource-panel",
            widthInGrid: "8",
            heightInGrid: "6",
            callback: function(str) {}
        };

    // The actual plugin constructor
    function Plugin( element, options ) {
        this.options = $.extend( {}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.element = element;

        this.init();
    }

    Plugin.prototype.init = function () {
        this.initBind();
        this.initCustomEventHandler();
    };



    // this will bind click and drag event to the components in the panel
    Plugin.prototype.initBind = function() {
        $canvas = $("#"+this.options.canvasId);
        var plugin = this;
        $(this.element).draggable({
            // set grid as basic unit for move
            appendTo: "body",
            //grid: [ YHB.gridSize, YHB.gridSize ],
            opacity: 0.6,
            zIndex: 10,
            revert: "invalid",
            helper: "clone",
            start: function(event, ui) {
                // TODO: splashing the canvas to attrack attention
            },
            drag: function(event, ui) {
                $("#"+plugin.options.canvasId).trigger("dragging", [ ui.position.top, ui.position.left, plugin.options.widthInGrid*YHB.gridSize, plugin.options.heightInGrid*YHB.gridSize ]); 
            },
            stop: function(event, ui) {
                // this process is moved to function(initEventHandler) because we need use droppable widget .
                $("#"+plugin.options.canvasId).trigger("dragStopped");
            }
        });

    }


    Plugin.prototype.initCustomEventHandler = function() {
        var plugin = this;
        $(this.element).on("dropped", function(event, ui){
            // transfer control to each component plugins 
            // 每个com进行初始自己的html，并绑定相应的事件
            var comid = "com"+YHB.comCount.getCount();
            $("<div id='"+comid+"'</div>")[plugin.options.componentName]({
                canvasId: plugin.options.canvasId,
                editorId: plugin.options.editorId,
                resourcePanelId: plugin.options.resourcePanelId,
                widthInGrid: plugin.options.widthInGrid,
                heightInGrid: plugin.options.heightInGrid,
                newlyAdded: true, // 标志是否是新加入的component，如果是，需要使用ui进行初始化并进行绑定，如果否，则仅需要绑定
                initialTopInGrid: Math.round(ui.position.top/YHB.gridSize),
                initialLeftInGrid: Math.round(ui.position.left/YHB.gridSize),
                callback: plugin.options.callback
            });
            
            YHB.comCount.incCount();

        });
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