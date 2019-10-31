var arrLang = {
  "en": {
    "HOME": "Home",
    "ABOUT": "About Us",
    "CONTACT": "Contact Us",
  },
  "zh": {
    "HOME": "首页",
    "ABOUT": "关于我们",
    "CONTACT": "联络我们",
  }
};
function loadlan()
{
   /*var fso = new ActiveXObject("Scripting.FileSystemObject");
    var path = './../lan';
    var fldr = fso.GetFolder(path);
      var ff = new Enumerator(fldr.Files);
        var s = '';
  var fileArray = new Array();
  var fileName = '';
  var count = 0;
  for(; !ff.atEnd(); ff.moveNext()){
   fileName = ff.item().Name + '';
   count++;
  }
  alert(count + ',' + s);*/
}


// The default language is English
var lang = "en";
// Check for localStorage support
if('localStorage' in window){
   
   var usrLang = localStorage.getItem('uiLang');
   if(usrLang) {
       lang = usrLang
   }

}


console.log(lang);
function changelan(language)
{
  var lang =language;// $(this).attr("id");
          // update localStorage key
  if('localStorage' in window){
      localStorage.setItem('uiLang', lang);
      console.log( localStorage.getItem('uiLang') );
  }

  $(".lang").each(function(index, element) {
      $(this).text(arrLang[lang][$(this).attr("key")]);
  });
}
//初始化
$(document).ready(function() {
  loadlan();
  $(".lang").each(function(index, element) {
    $(this).text(arrLang[lang][$(this).attr("key")]);
    });
});

        /*// get/set the selected language
        $(".translate").click(function() {
          var lang = $(this).attr("id");
          console.log("333333333333");
          // update localStorage key
          if('localStorage' in window){
               localStorage.setItem('uiLang', lang);
               console.log( localStorage.getItem('uiLang') );
          }

          $(".lang").each(function(index, element) {
            $(this).text(arrLang[lang][$(this).attr("key")]);
          });
        });*/

//下拉列表改变事件
function func(){  
  var vs = $('select  option:selected').val(); 
  console.log(vs);
  changelan(vs);
 }  