/* 地址选择函数
 * region address selection
 * 2014年8月10日
 */
function addressselectiondialog()
{
    var me = $(this);
    if(me.hasClass('wl-info-active')) return;

    var elem = 	"<div class='ks-popup ks-overlay'>";
    elem += 		"<div class='ks-popup-content ks-overlay-content'>";
    elem += 			"<div class='wl-areatab-con'>";
    elem += 				"<span class='address-all-close'></span>";
    elem += 				"<div class='address-all-title-par clearfix'>";
    elem += 					"<div class='address-all-title address-all-title-selected' parent-id='0' region-id='0' region-type='province' id='J-AddressAllTitle-province' >请选择<s></s></div>";
    elem += 					"<div class='address-all-title address-all-title-hidden' parent-id='0' region-id='0' region-type='city' id='J-AddressAllTitle-city'>请选择<s></s></div>";
    elem += 					"<div class='address-all-title address-all-title-hidden' parent-id='0' region-id='0' region-type='area' id='J-AddressAllTitle-area'>请选择<s></s></div>";
    elem += 				"</div>";

    elem += 				"<div class='address-all-con-par clearfix'>";
    //省
    elem += 					"<div class='address-all-con address-all-con-selected' id='J-AddressAllCon-province'>";
    elem += 						"<ul class='wl-list-add-con clearfix'></ul>";
    elem += 					"</div>";

    //市
    elem += 					"<div class='address-all-con' id='J-AddressAllCon-city'>";
    elem += 						"<ul class='wl-list-add-con clearfix'></ul>";
    elem += 					"</div>";

    //区
    elem += 					"<div class='address-all-con' id='J-AddressAllCon-area'>";
    elem += 						"<ul class='wl-list-add-con clearfix'></ul>";
    elem += 					"</div>";
    elem += 					"<div class='clear'></div>";
    elem += 				"</div>";
    elem += 			"</div>";
    elem += 		"</div>";
    elem += 	"</div>";

    me.parent().append(elem);

    addr_data_init(me);

    me.addClass('wl-info-active');

    $('.address-all-close').click(address_all_close);
    $(document.body).click(address_all_close);
    $('.address-all-title').click(pro_city_area_switch);
    $('.address-all-title').click(function(e){e.stopPropagation();});
    $('.ks-popup').click(function(e){e.stopPropagation();});
}

function getregionfromserver(element)
{
    var region_id = element.attr('region-id');
    var parent_id = element.attr('parent-id');
    var region_type = element.attr('region-type');
    var url = REAL_SITE_URL + '/index.php?app=mlselection&type=region';
    $.getJSON(url, {'pid':parent_id}, function(data){
        if (data.done)
        {
            $(".ks-popup #J-AddressAllCon-" + region_type + " ul").html('');
            if (data.retval.length > 0)
            {
                var data  = data.retval;
                for (i = 0; i < data.length; i++)
                {
                    var active_itm = '';
                    if(data[i].region_id == region_id )
                    {
                        active_itm = 'wl-list-add-active';
                    }
                    $(".ks-popup #J-AddressAllCon-" + region_type + " ul").append("<li data-id='" + data[i].region_id + "' data-title='" + data[i].region_name + "' parent-id='"+ data[i].parent_id +"' class='J-WlListItem wl-list-item "+ active_itm +"'>" + data[i].region_name + "</li>");
                }
                $(".ks-popup #J-AddressAllCon-" + region_type + " ul li").click(switchtonext);
                $(".ks-popup #J-AddressAllCon-" + region_type + " ul li").click(function(e){e.stopPropagation();});
            }
            else
            {
                $(".ks-popup #J-AddressAllCon-" + region_type + " ul").append("<div style='padding-left:3px;'>暂无数据</div>");
            }
        }
        else
        {
            alert(data.msg);
        }
    });
}
//数据显示
function address_table_show(elem_item,title)
{
    $('.address-all-title').removeClass('address-all-title-selected').addClass('address-all-title-hidden');
    elem_item.addClass('address-all-title-selected').removeClass('address-all-title-hidden').show();
    elem_item.nextAll('.address-all-title').hide();
    elem_item.html(title + "<s></s>");
    getregionfromserver(elem_item);
    var region_type = elem_item.attr('region-type');
    $('.address-all-con').removeClass('address-all-con-selected');
    $('#J-AddressAllCon-' + region_type).addClass('address-all-con-selected');
}
//初始数据
function addr_data_init(element)
{
    var city = element.attr('city');
    var city_id = element.attr('city_id');
    var province = element.attr('province')? element.attr('province') : '北京';
    if(city != '')
    {
        $('#J-AddressAllTitle-province').html(province + "<s></s>")
        var elem_item = $('#J-AddressAllTitle-city');
        var region_id = element.attr('region_id');
        var parent_id = element.attr('parent_id');
        elem_item.attr('region-id',region_id);
        elem_item.attr('parent-id',parent_id);
        var title = city;
    }
    else
    {
        var elem_item = $('#J-AddressAllTitle-province');
        var region_id = element.attr('region_id');
        var parent_id = 0;
        elem_item.attr('region-id',region_id);
        elem_item.attr('parent-id',parent_id)
        var title = province;
    }

    address_table_show(elem_item,title);

}
//区域切换
function pro_city_area_switch()
{
    address_table_show($(this),"请选择");
}
//查看产品是否可以到达该地区
//根据region_id 异步获得 实时的总价
function checkDeliverableByRegion(region_id,store_id){
    var geturl = "index.php?app=goods&act=check_deliverable&region_id="+region_id+"&store_id="+store_id+"&ajax=1";
    //console.log(geturl);
    //alert(geturl);
    geturl=encodeURI(encodeURI(geturl));
    $.get(geturl, function(data,status){
        if(status=="success"){
            var jsonobj=eval('('+data+')');
            //alert(jsonobj);
            switch(jsonobj.ret)
            {
                case '0':
                    $("#deliverable_msg_show").html(jsonobj.result);
                    $("#deliverable_msg_show").attr('title',jsonobj.msg);
                    return;
                case '2':
                    $("#deliverable_msg_show").html(jsonobj.result);
                    $("#deliverable_msg_show").attr('title','');
                    return;
                default:
                    $("#deliverable_msg_show").html('未知');
                    $("#deliverable_msg_show").attr('title','未知');
                    return;
            }
        }
    });
}
//切换到下一级
function switchtonext()
{
    me=$(this);
    var data_id = me.attr('data-id');
    var data_title = me.attr('data-title');
    var parent_id = me.attr('parent-id');
    var region_type = me.parent().parent().attr('id');

    if(region_type == "J-AddressAllCon-province")
    {
        $('#J-AddressAllTitle-province').html(data_title + '<s></s>');
        $('#J-AddressAllTitle-province').removeClass('address-all-title-selected').addClass('address-all-title-hidden');
        $('#J-AddressAllTitle-city').attr('parent-id',data_id);
        $('#J-AddressAllTitle-city').attr('region-id','');
        $('#J-AddressAllTitle-city').addClass('address-all-title-selected').removeClass('address-all-title-hidden').show();
        $('#J-AddressAllTitle-city').html('请选择<s></s>');
        getregionfromserver($('#J-AddressAllTitle-city'));
        $('.address-all-con').removeClass('address-all-con-selected');
        $('#J-AddressAllCon-city').addClass('address-all-con-selected');

        $('.visitorregionname').html(data_title + '<s></s>');
        $('.visitorregionname').attr('province',data_title);
        $('.visitorregionname').attr('province_id',data_id);
        $('.visitorregionname').attr('city','');
        $('.visitorregionname').attr('city_id','');
        $('.visitorregionname').attr('parent_id',parent_id);
        $('.visitorregionname').attr('region_name',data_title);
        $('.visitorregionname').attr('region_id',data_id);
    }
    else
    {
        $('.visitorregionname').html($('.visitorregionname').attr('province') + data_title + '<s></s>');
        $('.visitorregionname').attr('city',data_title);
        $('.visitorregionname').attr('city_id',data_id);
        $('.visitorregionname').attr('parent_id',parent_id);
        $('.visitorregionname').attr('region_name',data_title);
        $('.visitorregionname').attr('region_id',data_id);

        checkDeliverableByRegion(data_id,$('#t_store_id').val());
        address_all_close();
    }

}
function address_all_close()
{
    $('.visitorregionname').removeClass('wl-info-active');
    $('.ks-popup').remove();
}

/* 多级选择相关函数，如地区选择，分类选择
 * multi-level selection
 */

/* 地区选择函数 */
function regionInit(divId)
{
    $("#" + divId + " > select").change(regionChange); // select的onchange事件
    $("#" + divId + " > input:button[class='edit_region']").click(regionEdit); // 编辑按钮的onclick事件
}

function regionChange()
{
    // 删除后面的select
    $(this).nextAll("select").remove();

    // 计算当前选中到id和拼起来的name
    var selects = $(this).siblings("select").andSelf();
    var id = 0;
    var names = new Array();
    for (i = 0; i < selects.length; i++)
    {
        sel = selects[i];
        if (sel.value > 0)
        {
            id = sel.value;
            name = sel.options[sel.selectedIndex].text;
            names.push(name);
        }
    }
    $(".mls_id").val(id);
    $(".mls_name").val(name);
    $(".mls_names").val(names.join("\t"));

    // ajax请求下级地区
    if (this.value > 0)
    {
        var _self = this;
        var url = REAL_SITE_URL + '/index.php?app=mlselection&type=region';
        $.getJSON(url, {'pid':this.value}, function(data){
            if (data.done)
            {
                if (data.retval.length > 0)
                {
                    $("<select><option>" + lang.select_pls + "</option></select>").change(regionChange).insertAfter(_self);
                    var data  = data.retval;
                    for (i = 0; i < data.length; i++)
                    {
                        $(_self).next("select").append("<option value='" + data[i].region_id + "'>" + data[i].region_name + "</option>");
                    }
                }
            }
            else
            {
                alert(data.msg);
            }
        });
    }
}

function regionEdit()
{
    $(this).siblings("select").show();
    $(this).siblings("span").andSelf().hide();
}

/* 商品分类选择函数 */
function gcategoryInit(divId)
{
    $("#" + divId + " > select").get(0).onchange = gcategoryChange; // select的onchange事件
    window.onerror = function(){return true;}; //屏蔽jquery报错
    $("#" + divId + " .edit_gcategory").click(gcategoryEdit); // 编辑按钮的onclick事件
}

function gcategoryChange()
{
    // 删除后面的select
    $(this).nextAll("select").remove();

    // 计算当前选中到id和拼起来的name
    var selects = $(this).siblings("select").andSelf();
    var id = 0;
    var names = new Array();
    for (i = 0; i < selects.length; i++)
    {
        sel = selects[i];
        if (sel.value > 0)
        {
            id = sel.value;
            name = sel.options[sel.selectedIndex].text;
            names.push(name);
        }
    }
    $(".mls_id").val(id);
    $(".mls_name").val(name);
    $(".mls_names").val(names.join("\t"));

    // ajax请求下级分类
    if (this.value > 0)
    {
        var _self = this;
        var url = REAL_SITE_URL + '/index.php?app=mlselection&type=gcategory';
        $.getJSON(url, {'pid':this.value}, function(data){
            if (data.done)
            {
                if (data.retval.length > 0)
                {
                    $("<select><option>" + lang.select_pls + "</option></select>").change(gcategoryChange).insertAfter(_self);
                    var data  = data.retval;
                    for (i = 0; i < data.length; i++)
                    {
                        $(_self).next("select").append("<option value='" + data[i].cate_id + "'>" + data[i].cate_name + "</option>");
                    }
                }
            }
            else
            {
                alert(data.msg);
            }
        });
    }
}

function gcategoryEdit()
{
    $(this).siblings("select").show();
    $(this).siblings("span").andSelf().remove();
}