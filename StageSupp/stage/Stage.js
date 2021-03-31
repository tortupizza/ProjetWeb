function selView(n, litag) {
  var svgview = "none";
  var codeview = "none";
  switch(n) {
    case 1:
      svgview = "inline";
      break;
    case 2:
      codeview = "inline";
      break;
      // add how many cases you need
    default:
      break;
  }

  document.getElementById("ent").style.display = svgview;
  document.getElementById("sta").style.display = codeview;
  var tabs = document.getElementById("tabs");
  var ca = Array.prototype.slice.call(tabs.querySelectorAll("li"));
  ca.map(function(elem) {
	
    elem.style.background="#F0F0F0";
    elem.style.borderBottom="1px solid gray"
  });

  litag.style.borderBottom = "1px solid white";
  litag.style.background = "white";
}

function selInit() {
  var tabs = document.getElementById("tabs");
  var litag = tabs.querySelector("li");   // first li
  litag.style.borderBottom = "1px solid white";
  litag.style.background = "white";
}

window.onload=function() {
	selInit()
}

document.getElementById("btn_ent").onclick=function() {
	selView(1, this)
}

document.getElementById("btn_sta").onclick=function() {
	selView(2, this)
}

/*document.getElementById("btn_p").onclick=function() {
	var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://reqres.in/api/users?page" + pageid + '&per_page=4', true);
    xhr.onload = function()
    {
        var html = "";
        if( xhr.status == 200 )
        {
            var r = JSON.parse(xhr.response);
            var page_number = r.page;
            var total_pages = r.total_pages;
            var d = r.data;
            var cu; // current user
            for (let i = 0; i < d.length; i++)
            {
                cu = d[i];
                html += '<fieldset>' + cu.first_name + ' ' + cu.last_name + ' <hr>' + cu.email + '<br> <img src="' + cu.avatar + '"></fieldset>';
            }
            var next_page = page_number < total_pages ? ' - <a onclick="return get_users(' + (page_number + 1) + ');return false;" href="#">Page suivante</a>' : '';
            var prev_page = page_number > 1 ? ' - <a onclick="return get_users(' + (page_number - 1) + ');return false;" href="#">Page précédente</a>' : '';
            html+= '<di>' + 'Pages ' + page_number + '/' + total_pages + next_page + prev_page + '</div>';
        }
        else{
            html = '<p>Wrong Request. Error : ' + xhr.status + '</p>';

        }
        document.getElementById("js_result").innerHTML = html;
    };
    xhr.send(); //Envoi de la requ�te au serveur (asynchrone par d�faut)
}

document.getElementById("btn_w").onclick=function() {
	s
}*/