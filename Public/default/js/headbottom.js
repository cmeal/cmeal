// JavaScript Document
function showSubCategory(){
    $("#AllSort dt").mouseover(function(){
        var newDiv=document.getElementById("EFF_div_"+this.id.substr(7));
        this.className="curr";
        if (newDiv){
            newDiv.style.display="block";
            return;
        }else{
            //var CLASS_NAME=($.browser.msie?($.browser.version>"7.0")?"class":"className":"class");
            var CLASS_NAME = "class";
            var newDiv_wrap=document.createElement("div");
            newDiv_wrap.setAttribute(CLASS_NAME,"pop_wrap");
            newDiv_wrap.setAttribute("id","EFF_div_"+this.id.substr(7))
            var newDiv=document.createElement("div");
            newDiv.setAttribute(CLASS_NAME,"pop");
            newDiv_wrap.appendChild(newDiv);
            //newDiv.innerHTML=($.browser.msie)?this.nextSibling.innerHTML:this.nextSibling.nextSibling.innerHTML;
            var content = this.nextSibling.innerHTML;
            if(content == null)
            {
                content = this.nextSibling.nextSibling.innerHTML;
            }
            newDiv.innerHTML=content;
            //alert(newDiv.innerHTML);
            this.parentNode.insertBefore(newDiv_wrap,this);
            newDiv_wrap.style.display="block";
        }
        //test/
        $(".pop_wrap").mouseover(function(){
            $(this).css({"display":"block"});
            this.nextSibling.className="curr";
        }).bind("mouseleave",function(){
            $(this).css({"display":"none"});
            this.nextSibling.className="";
        })
        //test end/
    }).bind("mouseleave",function(){
        //alert('mouseleave');
        this.className=(this.nextSibling.className=="Dis")?"curr":"";
        $(".pop_wrap").css({"display":"none"});
    });
}
function showOrHideCategoryList(){
    var divflag=document.getElementById("flagindex");
    if(divflag!=null){
        var value = divflag.innerHTML;
    }
    var select_list_category = document.getElementById("select_list_category");
    //列表显示
    var float_list_category = document.getElementById("float_list_category");
    var z_index_category = document.getElementById("z_index_category");
    var ico_down = document.getElementById("ico_down");
    if(value){
        float_list_category.style.display = "block";
        ico_down.style.display = "none";
    }else{
        ico_down.style.display = "inline-block";
        float_list_category.style.display = "none";
        select_list_category.style.width = 206;
        select_list_category.onmouseover = function () {
            float_list_category.style.display = "block";
            ico_down.src = "../images/ico_up_white.png";

        };
        select_list_category.onmouseout = function () {
            float_list_category.style.display = "none";
            ico_down.src = "../images/ico_down_white.png";
        };
    }
}
showSubCategory();
showOrHideCategoryList();