/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */
$(document).ready(function(){
    $("button.item").click(function(){
        var items = $(this).parent('td').siblings('td');
        var postdata = {
            id : items.parent('tr').data('id'),
            type : items.parent('tr').data('type'),
            name : $(items[0]).html(),
            price : $(items[1]).html(),
            posttype : 'item'
        };
        $.post('controller/functions.php',postdata,function(data){
            if(data){
                window.location.reload();
            } else alert('There was an error');
        })
    });
    $("button.item-small").click(function(){
        var items = $(this).parent('td').siblings('td');
        console.log($(items[0]).html());
        var postdata = {
            id : items.parent('tr').data('id'),
            type : items.parent('tr').data('type'),
            name : $(items[0]).html(),
            price : $(items[1]).html(),
            posttype : 'item-small'
        };
        $.post('controller/functions.php',postdata,function(data){
            if(data){
                window.location.reload();
            } else alert('There was an error');
        })
    });
    $("button.item-large").click(function(){
        var items = $(this).parent('td').siblings('td');
        var postdata = {
            id : items.parent('tr').data('id'),
            type : items.parent('tr').data('type'),
            name : $(items[0]).html(),
            price : $(items[3]).html(),
            posttype : 'item-large'
        };
        $.post('controller/functions.php',postdata,function(data){
            if(data){
                window.location.reload();
            } else alert('There was an error');
        })
    });
    $("button.item-remove").click(function(){
        var items = $(this).parent('td').siblings('td');
        var postdata = {
            id : items.parent('tr').data('session-id'),
            posttype : 'item-delete'
        };
        $.post('controller/functions.php',postdata,function(data){
            if(data){
                window.location.reload();
            } else alert('There was an error');
        })
    });
    $("#checkout").click(function(){
        if($('#phn').val()==''){
            alert('Please Enter Your Contact Number.');
            window.location = 'checkout';
        }else{
            var phnNo = $('#phn').val();
            $.post('controller/functions.php',{posttype : 'checkout', contact : phnNo},function(data){
                if(data){
                    window.location = 'thankyou';
                }else
                    alert('No item in cart!');
            })
        }
    });

})