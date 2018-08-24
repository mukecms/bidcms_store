// 素材库瀑布流
        window.onload=function(){
            waterfall("main-water");
        };
        function waterfall(parent,box){
            var oParent=document.getElementById(parent);
            var oBox=oParent.children;
            var $oBox=$(oBox);
            var boxArr=[];  //定义存放class为box的元素
            for(var i=0;i<oBox.length;i++){
                boxArr.push(oBox[i]);
            }
            //计算列数(main的宽度/box的宽度)
            var mainW=oParent.offsetWidth;            
            var boxW=oBox[0].offsetWidth;
            var boxoutW=$oBox.outerWidth(true);
            //alert(boxoutW)
            var cols=Math.floor(mainW/boxoutW);
            //定义一个用来存放第一行box高度的数组
            var hArr=[];
            for(var i=0;i<oBox.length;i++){
                if(i<cols){
                    //hArr.push(oBox[i].offsetHeight)
                    hArr[i]=$(oBox[i]).outerHeight(true);
                }else{
                    var minH=Math.min.apply(null,hArr);
                    var index=getIndex(hArr,minH);
                    oBox[i].style.position="absolute";
                    oBox[i].style.top=minH+10+"px";
                    oBox[i].style.left=index*boxoutW+"px";
                    hArr[index]+=$(oBox[i]).outerHeight(true);
                };
            };
            var len=$(".new-lst-item").length;
            var len_2=len-2;
            var len_3=len-3;
            var top_01=$(".new-lst-item:last").position().top;
            var top_02=$(".new-lst-item:eq("+len_2+")").position().top;
            if($(".new-lst-item:eq("+len_3+")")){
                var top_03=$(".new-lst-item:eq("+len_3+")").position().top
                var h_03=$(".new-lst-item:eq("+len_3+")").outerHeight(true);
            }
            var h_01=$(".new-lst-item:eq(-2)").outerHeight(true); 
            var h_02=$(".new-lst-item:last").outerHeight(true);
            var maxTop=Math.max(top_01,top_03,top_03);
            var maxHeight=Math.max(h_01,h_02,h_03);
            var MinHeight=(maxTop-0)+(maxHeight-0);
            $("#main-water").attr('style', 'min-height:550px;');
            $("#main-water").attr('style','min-height:'+MinHeight+'px;');
            //console.log(cols+"\n"+hArr)
        };
        //获取高度最小值的索引的函数
        function getIndex(arr,val){
            for(var i in arr){
                if(arr[i]==val){
                    return i;
                }
            }
        };