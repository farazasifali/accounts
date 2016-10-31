/* 
    Created on : Oct 31, 2016, 3:34:15 PM
    Author     : Faraz
*/

$(function(){
    //Cashe Body
    var $body = $('body');
    
    //Function To refresh Page
    $body.on('click', '#refresh', function(e){
        e.preventDefault();
        location.reload();
    });
    
    //Function for check all
    $("#checkAll").click(function(){
        $('.checkAll').not(this).prop('checked', this.checked);
    });
    
    //Function Delete Submit
    $("#deleteFromSubmit").click(function(e){
        e.preventDefault();
        if(confirm("Do you realy want to delete?"))
        {
            $('#deleteForm').submit();
        }
    });
});