var source = ["img/red.png","img/orange.png","img/green.png"];
var arr = document.getElementsByTagName("div")[0].getElementsByTagName("img");
var i=0;
function rest (arr , num)
    {
        for(var x=0;x<arr.length;x++)
            {
                if(x != num)
                    {
                        arr[x].setAttribute('src','img/gray.png');
                    }
            }
    }
function change()
    {

        console.log(i);

            rest(arr, i);
            arr[i].setAttribute('src', source[i]);
            i=(i==2)?0:++i;

    }

    setInterval(change, 1000);
