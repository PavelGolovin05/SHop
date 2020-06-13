function ready ()
{
    var inputs = document.querySelectorAll('.inputfile');
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label = input.nextElementSibling,
            lavelVal = label.innerHTML;

        input.addEventListener('change', function(e)
        {
            console.log(this.files);
            var filename = '';
            if( this.files && this.files.lenght > 1)
                filename = ( this.getAttribute('data-multiple-caption') || '' ).replace( '(count)'.this.files.lenght)
            else
                filename = this.files[0].name;

            if(filename)
                label.querySelector('span').innerHTML = filename;
            else
                label.innerHTML = labelVal;
        });
    });
};

document.addEventListener("DOMContentLoaded",ready);
