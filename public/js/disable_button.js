document.querySelectorAll('form.prevent-multiple-submit').forEach(function(form){
    form.addEventListener('submit', function(){
        const button = form.querySelector('button[type="submit"]');
        if(button){
            button.disabled = true;
            button.innerText = 'Processing...'
        }
    });
});