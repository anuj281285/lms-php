<!doctype html>
<html lang="en">

<!-- Mirrored from demo.creativeitem.com/academy/addons/ebook/view/7 by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Jun 2024 11:19:04 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A House Between Earth and the Moon | Academy</title>
  <link rel="icon" href="../../../uploads/system/1268adfb5db8c00c75b37961e8a9b787.png" type="image/x-icon">
  <style>
    #my_pdf_viewer{
      margin-bottom: 50px;
    }
    
    #canvas_container {
        width: 100%;
        height: 100%;
        overflow: auto;
        background: #fff;
        text-align: center;
    }
    #navigation_controls{
        background-color: #4b9d8a;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 50px;
        display: flex;
    }
     #go_previous{
        width: 50%;
        max-width: 200px;
        height: 100%;
        background-color: #754ffe;
        border: none;
        cursor: pointer;
        color: #fff;
        border-right: 1px solid #fff;
    }
    #go_next{
        width: 50%;
        max-width: 200px;
        height: 100%;
        background-color: #754ffe;
        border: none;
        cursor: pointer;
        color: #fff;
        border-left: 1px solid #fff;
    }
    #current_page{
        height: 48px;
        width: 100%;
        border: none;
        background-color: #754ffe;
        text-align: center;
        font-weight: 900;
        font-size: 18px;
        color: #fff;
    }
    #zoom_controls{
        background-color: #0000;
        position: fixed;
        bottom: 55px;
        right: 0;
        left: 0;
        text-align: center;
    }
</style>
  <script src="../../../assets/global/pdf-canvas/pdf.min.js"></script>
  <script src="../../../assets/global/pdf-canvas/pdf.worker.min.js"></script>
  
</head>
<body>
     <div id="my_pdf_viewer">
        <div id="canvas_container">
            <canvas id="pdf_renderer"></canvas>
        </div>
 
        <div id="navigation_controls">
            <button id="go_previous">Previous</button>
            <input id="current_page" value="1" type="number"/>
            <button id="go_next">Next</button>
        </div>
 
        <div id="zoom_controls">  
            <button id="zoom_out" style="font-size: 18px; width: 30px;">-</button>
            <button id="zoom_in" style="font-size: 18px; width: 30px;">+</button>
            <button onclick="
                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen();
                  } else if (document.exitFullscreen) {
                    document.exitFullscreen();
                  }
            " style="font-size: 18px; width: 30px;">
                <svg xmlns="http://www.w3.org/2000/svg" height="13" viewBox="0 96 960 960" width="13"><path d="M200 856V663h60v133h133v60H200Zm0-367V296h193v60H260v133h-60Zm367 367v-60h133V663h60v193H567Zm133-367V356H567v-60h193v193h-60Z"/></svg>
            </button>
            <a href="../../../ebook/ebook_details/a-house-between-earth-and-the-moon/7.html" style="font-size: 18px; position: fixed; top: 20px; right: 20px;">Back</a>

        </div>
    </div>
 
    <script>
        var myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1.4
        }
      
        pdfjsLib.getDocument('7/pdf.html').then((pdf) => {
      
            myState.pdf = pdf;
            render();
 
        });
 
        function render() {
            myState.pdf.getPage(myState.currentPage).then((page) => {
          
                var canvas = document.getElementById("pdf_renderer");
                var ctx = canvas.getContext('2d');
      
                var viewport = page.getViewport(myState.zoom);
                console.log(viewport);
 
                canvas.width = viewport.width;
                canvas.height = viewport.height;
          
                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });
            });
        }
        
        document.getElementById('go_previous').addEventListener('click', (e) => {
            if(myState.currentPage > 1) {
                myState.currentPage -= 1;
                document.getElementById("current_page").value = myState.currentPage;
                    render();
                    window.scrollTo(0, 0);return;
            }
        });
 
        document.getElementById('go_next').addEventListener('click', (e) => {
            if(myState.currentPage < myState.pdf._pdfInfo.numPages){
                myState.currentPage += 1;
                document.getElementById("current_page").value = myState.currentPage;
                render();
                window.scrollTo(0, 0);
            }
        });
 
        document.getElementById('current_page').addEventListener('keypress', (e) => {
            if(myState.pdf == null) return;
          
            // Get key code
            var code = (e.keyCode ? e.keyCode : e.which);
          
            // If key code matches that of the Enter key
            if(code == 13) {
                var desiredPage = 
                document.getElementById('current_page').valueAsNumber;
                                  
                if(desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
                    myState.currentPage = desiredPage;
                    document.getElementById("current_page").value = desiredPage;
                    render();
                }
            }
        });
 
        document.getElementById('zoom_in').addEventListener('click', (e) => {
            if(myState.pdf == null) return;
            myState.zoom += 0.2;
            render();
        });
 
        document.getElementById('zoom_out').addEventListener('click', (e) => {
            if(myState.pdf == null) return;
            myState.zoom -= 0.2;
            render();
        });
        
        //Disable right button
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</body>

<!-- Mirrored from demo.creativeitem.com/academy/addons/ebook/view/7 by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Jun 2024 11:19:05 GMT -->
</html>