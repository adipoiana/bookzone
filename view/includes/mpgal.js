// MPGal - Simple Image Gallery - By MarPlo: http://www.marplo.net/ , http://coursesweb.net/
function MPGal(){
   // returns an object with width and height of the window
  function winSize(){  
    if(self.innerHeight) return {width:window.innerWidth, height:window.innerHeight};
    else if (document.documentElement) return {width:document.documentElement.clientWidth, height:document.documentElement.clientHeight};
  }
  var win_size = winSize();
  var me = this;
  var obn ='mpgal';  //object instance name
  var box_imgs = [];  //image objects to be showed in #mpgal
  var config = {  //default config data
    maxheight: 350,
    maxwidth: 500,
    modal: 'true',
    showimg: 'true',
    thumb_height: 50,
    thumb_width: 80
  };
  var glim = {0:{nre:0}};  //galleries-images 0:{{src, w, h, alt, capt, ..}, config-data},..

  //returns image width/height for $max_size raported to $nat_size (natural_sizes). Receives image object, and max_size={width,height}
  function imgSize(nat_size, max_size){
    var procent = {w:1.02, h:1.02}
    if(nat_size.width > max_size.width) procent.w = max_size.width / nat_size.width;
    if(nat_size.height > max_size.height) procent.h = max_size.height / nat_size.height;
    procent = Math.min(procent.w, procent.h);
    return {width:nat_size.width *procent, height:nat_size.height *procent};
  }

  //return html code with text from data-caption in img
  function setCaption(img){
    var caption = img.getAttribute('data-caption');
    if(caption) return {div:'<div class="mp_capt">'+ caption +'</div>', data:'data-caption="'+ caption +'"'};
    else return {div:'', data:''};
  }

  //set img for modal-box
  me.imgModal = function(gln, imn){
    var im_tag = '<img src="'+ glim[gln][imn].src +'" alt="'+ glim[gln][imn].alt +'" height="'+ glim[gln][imn].hm +'" width="'+ glim[gln][imn].wm +'" data-gim="'+ gln +'-'+ imn +'" '+ glim[gln][imn].capt.data +'/>'+ glim[gln][imn].capt.div;
    adModal(im_tag, gln, imn);  //show the image in modal
  }

  //return html with prev/next, receives gallery,image index
  function setPrevNext(gln, imn){
    var prev = (imn >0) ?'<div class="mp_prev" onclick="'+ obn +'.imgModal('+ gln +','+ (imn -1) +');">&lsaquo;</div>' :'';
    var next = (imn < glim[gln].nre -1) ?'<div class="mp_next" onclick="'+ obn +'.imgModal('+ gln +','+ (imn +1) +');">&rsaquo;</div>' :'';
    return prev + next;
  }

  // create the modal element with elm, style = css-style for .mpgal_show
  function adModal(elm, gln, imn){
    gln *=1;  imn *=1;  //makes int
    var elm ='<div id="mpgal_transp" onclick="'+ obn +'.delModal();"></div><div id="mpgal_show" style="width:'+ glim[gln][imn].wm +'px; margin-top:calc('+ glim[gln][imn].modal_top +'px - 3%);"><div id="mpgal_x" onclick="'+ obn +'.delModal();">X</div>'+ elm + setPrevNext(gln, imn) +'</div>';
    // if "#mpgal" exists, add the "elm" into, else, create it
    if(document.getElementById('mpgal')) document.getElementById('mpgal').innerHTML = elm;
    else document.body.insertAdjacentHTML('beforeend', '<div id="mpgal">'+ elm +'</div>');
  }

  // delete the element created with adModal()
  me.delModal = function() {
    if(document.getElementById('mpgal')) document.getElementById('mpgal').outerHTML ='';
  }

  //add in elm a Div with image data from glim[gln][imn]
  function adImGallery(elm, gln, imn){
    var img = '<img src="'+ glim[gln][imn].src +'" alt="'+ glim[gln][imn].alt +'" height="'+ glim[gln][imn].h +'" width="'+ glim[gln][imn].w +'" style="margin-top:'+ glim[gln][imn].img_top +'px;" data-gim="'+ gln +'-'+ imn +'" '+ glim[gln][imn].capt.data +'/>'+ glim[gln][imn].capt.div;
    var mp_gallery = elm.querySelector('.mp_gallery'); //contains image
    if(mp_gallery) mp_gallery.innerHTML = img;
    else elm.insertAdjacentHTML('afterbegin', '<div class="mp_gallery" style="width:'+ glim[gln].maxwidth +'px; height:'+ (28+ glim[gln].maxheight *1) +
    'px">'+ img +'</div>');

    //click for modal
    if(glim[gln].modal =='true') elm.querySelector('.mp_gallery img').addEventListener('click', function(e){
      var gim = e.target.getAttribute('data-gim').split('-');
      me.imgModal(gim[0], gim[1]);
    });
  }

  //set data in $glim; img=image-object, gln=gallery-index, imn=image-index
  function setImgData(img, gln, imn){
    var nat_size = {width:img.naturalWidth, height:img.naturalHeight};
    var img_size = imgSize(nat_size, {width:glim[gln].maxwidth, height:glim[gln].maxheight});  //image size for image in gallery
    var mod_size = imgSize(nat_size, win_size);  //image size for modal
    var tmb_size = imgSize(nat_size, {width:glim[gln].thumb_width, height:glim[gln].thumb_height});  //size for thumbs
    var img_alt = img.getAttribute('alt');
    var caption = setCaption(img);
    var img_top = (caption.div =='') ? (glim[gln].maxheight - img_size.height +24)/2 : 1+ (glim[gln].maxheight - img_size.height)/2;  //image margin-top in gallery
    var mod_top = (caption.div =='') ? (win_size.height - img_size.height +24)/2 : (win_size.height - img_size.height)/2;  //image margin-top in modal
    glim[gln].nre++;
    glim[gln][imn] = {src:img.src, w0:img.width, alt:img_alt, h0:img.height, w:img_size.width, h:img_size.height, wm:mod_size.width, hm:mod_size.height, wt:tmb_size.width, ht:tmb_size.height, capt:caption, img_top:img_top, modal_top:mod_top};
  }

  //set thumbs, and $img data in gallery $gal to index $gln, $imn;clicks
  function setThumb(gal, img, gln, imn){
    setImgData(img, gln, imn);
    img.width = glim[gln][imn].wt;
    img.height = glim[gln][imn].ht;
    if(glim[gln].modal =='true' && glim[gln].showimg =='false'){
      //click for modal
      img.addEventListener('click', function(e){
        var gim = img.getAttribute('data-gim').split('-');
        me.imgModal(gim[0], gim[1]);
      });
    }
    else {
      if(imn ==0) adImGallery(gal, gln, imn);  //show 1st image
      img.addEventListener('click', function(e){
        var gim = img.getAttribute('data-gim').split('-');
        adImGallery(img.parentElement, gim[0], gim[1]);
      });
    }
  }

  //get/set images from gallery $gal to its index $gln in $glim
  function getImgs(gal, gln){
    var ar_imgs = gal.querySelectorAll('img');
    for(var i=0; i<ar_imgs.length; i++){
      //add data-gim attr., call setThumb() when image loaded
      ar_imgs[i].setAttribute('data-gim', gln +'-'+ i);  //store gallery/image index
      if(ar_imgs[i].complete) setThumb(gal, ar_imgs[i], gln, i);
      else ar_imgs[i].addEventListener('load', function(e){
        var gim = e.target.getAttribute('data-gim').split('-');
        setThumb(gal, e.target, gim[0], gim[1]);
      });
    }
  }

  //get .mpgal elms which are not img, set image-gallery in $glim with data from data-mpgal
  function setGallery(){
    var ar_elms = document.querySelectorAll('.mpgal');
    var imn =0;
    for(var i=0; i<ar_elms.length; i++){
      glim[i +1] = {nre:0};  //start gallery object with number of elms
      //if not img, get and set thumbs
      if(ar_elms[i].tagName.toLowerCase() !='img'){
        //get/set data
        var data_tag = ar_elms[i].getAttribute('data-mpgal');
        data_tag = data_tag ? '{'+ data_tag.replace(/^[ ]*([^ \:]+)/ig, '"'+ "$1" +'"').replace(/:[ ]*([^ ,]+)/ig, ':"'+ "$1" +'"').replace(/,[ ]*([^ :]+)/ig, ',"'+ "$1" +'"') +'}' :'{}';
        data_tag = JSON.parse(data_tag);
        for(var k in config) glim[i +1][k] = data_tag[k] ? data_tag[k] : config[k];  //data from tag or default config
        getImgs(ar_elms[i], i +1);  //get/set images in current gallery
      }
      else {
        ar_elms[i].setAttribute('data-gim', '0-'+ imn);  //store gallery/image index
        setImgData(ar_elms[i], 0, imn);
        imn++;
        ar_elms[i].addEventListener('click', function(e){
          var gim = e.target.getAttribute('data-gim').split('-');
          me.imgModal(gim[0], gim[1]);
        });
      }
    }
  }

  setGallery();
}
var mpgal = {};

//create instance of MPGal() after DOM loads
document.addEventListener('DOMContentLoaded', function() {
 mpgal = new MPGal();
});
