
function getAjaxObject(){
    if (window.XMLHttpRequest) {
        // code for modern browsers
        return new XMLHttpRequest();
     } else {
        // code for old IE browsers
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}


function searchAccount(user){

    if(user.length > 3){
        var ajax = getAjaxObject();
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                
                var list = document.getElementById('found');
                var result = JSON.parse(this.responseText);
    
                if(result.result == 'OK'){
    
                    for(var n = 0; n < list.childNodes.length; n = 0){
                        var listChild = list.childNodes[n];
                        listChild.parentNode.removeChild(listChild);
                    }
    
                    for(i in result.data){
                        var option = document.createElement('option');
                        option.appendChild(
                            document.createTextNode(result.data[i].id + ' | ' + result.data[i].email)
                        );
                        option.setAttribute('value', result.data[i].login);
                        list.appendChild(option);
                    }
    
                }else{
                    alert('An unexpected error ocurred: ' + result.data);
                }
            
    
            }
        };
        ajax.open("GET", "ajax/search.php?q=" + user, true);
        ajax.send();
    }

}


