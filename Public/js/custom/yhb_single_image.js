/*
 * 我们使用了YHB namespace中的几个全局变量。
 */


;(function ( $, window, document, undefined ) {

    var pluginName = 'yhb_single_image',
        plugin,
        $this,
        $canvas,
        htmlObj,
        cssObj,
        defaults = {
            canvasId: "your_canvas",
            editorId: "your_editor",
            resourcePanelId: "resource_panel",
            widthInGrid: "2",
            heightInGrid: "2",
            newlyAdded: false, // 标志是否是新加入的component，如果是，需要使用ui进行初始化并进行绑定，如果否，则仅需要绑定
            initialTopInGrid: "0",
            initialLeftInGrid: "0",
            callback: function(str) {}
        };




    // 构造函数
    function Plugin( element, options ) {
        plugin = this;
        this.element = element;
        this.options = $.extend( {}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        htmlObj = this.htmlTpl();
        $this = $(element);
        $canvas = $("#"+this.options.canvasId);
        this.init();
    }

    // 此处需注意：需要区分不同的来源的com，
    // 如果是从右侧utilitydrag过来的，那么需要先append到canvas上，然后再进行绑定；
    // 如果重新编辑原来已有的( 例如，从后台加载过来的)，那么可以直接进行事件绑定，但是为了保持统一，需要对htmlObj进行初始化
    Plugin.prototype.init = function () {
        // 对于新加入的com，$this需要重新指定，对于已有的com，htmlObj需要初始化
        if(this.options.newlyAdded) {
            // 新增加一个com到canvas
            this.addComToCanvas();
        } else {
            // 从canvas中找到该com
            htmlObj.leftInGrid($this.css("left"));
            htmlObj.topInGrid($this.css("top"));
        }
        this.comBind($this.attr("id"));
        this.saveEventHandler();
    };

    Plugin.prototype.addComToCanvas = function() {
        htmlObj.leftInGrid(this.options.initialLeftInGrid);
        htmlObj.topInGrid(this.options.initialTopInGrid);
        htmlObj.saved(false);
        htmlObj.id($(this.element).attr("id"));
        //alert(htmlObj.html());
        $(htmlObj.html()).appendTo($canvas);
    };


    Plugin.prototype.saveEventHandler = function() {
        var comid = $this.attr("id");
        $("#"+comid).on("save", function() {
            
            if(!htmlObj.saved()) {
                alert(htmlObj.html());
                //plugin.options.callback(htmlObj.html());
            }
        });
    };


    // all related events should be handle here instead of in top level
    Plugin.prototype.bindEvent = function(comid) {
        // handle remove / delete event
        // TODO: add all parts of the component, e.g. delete button

        // handle click event
        //$("#"+plugin.options.editorId+" span").trigger("click");
        $("#"+comid).on("click", function() {
            // notice there must be an span element to trigger click correctly
            if(comid != YHB.currentComId || !htmlObj.saved()) {
                setCurrentComId(comid);
                plugin.clearEditPanel();
                plugin.setupEditPanel(comid);
                $("#"+YHB.previousComId).css("z-index", 90);
                $("#"+YHB.currentComId).css("z-index", 100);
            }
            $("#"+plugin.options.editorId).tab('show');
        });


    };

    Plugin.prototype.clearEditPanel = function() {
        var editorPageId = $("#"+plugin.options.editorId).attr("href");
        var $editorPage = $(""+editorPageId);
        $editorPage.empty();
    };

    Plugin.prototype.setupEditPanel = function(comid) {
        //alert(comid);
        // add edit ops into editor page
        var editorPageId = $("#"+plugin.options.editorId).attr("href");
        var $editorPage = $(""+editorPageId);

        // add editor information
        $editorPage.append(
            "<div class=\"edit-group\"> \
                 <div class=\"edit-group-title\">图片设置</div> \
                 <div class=\"edit-group-row\"> \
                     <div class=\"edit-group-col\"> \
                         <div class=\"edit-option\"> \
                             <button id=\"upload-image-id\" class=\"btn btn-primary\">上传图片</button> \
                             <button id=\"select-image-id\" class=\"btn btn-primary\">select image</button> \
                         </div> \
                     </div> \
                 </div> \
             </div>  "
        );

        // communicate with resource panel
        $editorPage.find("#select-image-id").on("click", function() {
            $("#"+plugin.options.resourceId).modal('toggle');
            $("#"+plugin.options.resourceId).find("#confirm-id").one("click", function(event) {
                plugin.changeURL(YHB.currentComId, $("#"+plugin.options.resourceId).find("#url-input-id").val());
                $("#"+plugin.options.resourceId).modal('toggle');
            });
        });

        
    };

    Plugin.prototype.changeURL = function(comid, url) {
        //alert(""+$("#"+comid).find("img").attr("src"));
        $("#"+comid).find("img").attr("src", url);
    };


    Plugin.prototype.bindDraggable = function(comid) {
        $("#"+comid).draggable({
            //grid: [ YHB.gridSize, YHB.gridSize ],
            opacity: 0.4,
            zIndex: 10,
            containment: $("#"+plugin.options.canvasId),
            start: function(event, ui) {
                setCurrentComId(comid);
            },
            stop: function(event, ui) {
                $("#"+plugin.options.canvasId).trigger("dragStopped");
                // animate to the suitable place
                $(this).animate({
                    "left": Math.round(ui.position.left/YHB.gridSize)*YHB.gridSize, 
                    "top":Math.round(ui.position.top/YHB.gridSize)*YHB.gridSize
                }, function() {
                    htmlObj.leftInGrid(Math.round(ui.position.left/YHB.gridSize));
                    htmlObj.topInGrid(Math.round(ui.position.top/YHB.gridSize));
                    htmlObj.saved(false);
                });
            },
            drag: function(event, ui) {
                plugin.options.callback("top:"+ui.position.top+" left:"+ui.position.left+" gridSize:"+YHB.gridSize);
                $("#"+plugin.options.canvasId).trigger("dragging", [ ui.position.top, ui.position.left, ui.helper.width(), ui.helper.height() ]); // ui has top left height and width
            }
        });
    };

    Plugin.prototype.bindResizable = function(comid) {
        
        $("#"+comid).resizable({
            start: function() {
                setCurrentComId(comid);
            },
            stop: function(event, ui) {
                htmlObj.widthInGrid(Math.round(ui.helper.width()/YHB.gridSize));
                htmlObj.heightInGrid(Math.round(ui.helper.height()/YHB.gridSize));
                htmlObj.saved(false);
                //alert(Math.round(ui.helper.height()/YHB.gridSize));
            },
            // set grid as basic unit for move
            // TODO： 此处有问题，高度随着缩放的次数而逐渐变小，可能的原因是jquery resizable插件里面height设置有问题
            grid: [ YHB.gridSize, YHB.gridSize ],
            animate: true
        });
    };

    // after drag to canvas, need combind events, like click, 
    Plugin.prototype.comBind = function(comid) {
        plugin.bindDraggable(comid);
        plugin.bindResizable(comid);
        plugin.bindEvent(comid); 
    };




   //组件的 html 代码
    Plugin.prototype.htmlTpl = function() {
        var saved = true,
            id = "tmp",
            imgSrc = "./Public/css/img/empty_image-72.jpg",
            
            leftInGrid = 0,
            topInGrid = 0,
            widthInGrid = plugin.options.widthInGrid,
            heightInGrid = plugin.options.heightInGrid;
 
        return {
            saved: function() {
                if(arguments.length === 0) return saved;
                else if(arguments.length === 1){
                    saved = arguments[0]; 
                }
             },
            id: function() { 
                if(arguments.length === 0) return id;
                else if(arguments.length === 1){
                    id = arguments[0]; 
                }
            },
            imgSrc: function() { 
                if(arguments.length === 0) return imgSrc;
                else if(arguments.length === 1){
                    imgSrc = arguments[0]; 
                }
            },

            leftInGrid: function() { 
                if(arguments.length === 0) return leftInGrid;
                else if(arguments.length === 1){
                    leftInGrid = arguments[0]; 
                }
            },

            topInGrid: function() { 
                if(arguments.length === 0) return topInGrid;
                else if(arguments.length === 1){
                    topInGrid = arguments[0]; 
                }
            },

            widthInGrid: function() { 
                if(arguments.length === 0) return widthInGrid;
                else if(arguments.length === 1){
                    widthInGrid = arguments[0]; 
                }
            },

            heightInGrid: function() { 
                if(arguments.length === 0) return heightInGrid;
                else if(arguments.length === 1){
                    heightInGrid = arguments[0]; 
                }
            },

            html: function() { 
                return "<div class='component' id='"+id+"' pluginname='yhb_single_image' style='position:absolute; top:"+topInGrid*YHB.gridSize+"px; left:"+leftInGrid*YHB.gridSize+"px; width:"+widthInGrid*YHB.gridSize+"px; height:"+heightInGrid*YHB.gridSize+"px; background-color:#ccc;'><img class='single_image_class' src='"+imgSrc+"'></div>";
            },
            style: function() { 
                return "position:absolute; top:"+topInGrid*YHB.gridSize+"px; left:"+leftInGrid*YHB.gridSize+"px; width:"+widthInGrid*YHB.gridSize+"px; height:"+heightInGrid*YHB.gridSize+"px; background-color:#ccc; ";
            }
        }; 
    };






    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, pluginName)) {
                $.data(this, pluginName, 
                new Plugin( this, options ));
            }
        });
    }

})( jQuery, window, document );