(function(){
    document.getElementById('otherInformation').style.display = 'none';
})();

document.getElementById('otherInfo').addEventListener('click',function(){
    
    var otherInfo = document.getElementById('otherInformation');

    if(otherInfo.style.display == 'none')
        otherInfo.style.display = 'block';
    else    
        otherInfo.style.display = 'none';
});
