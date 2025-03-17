<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=10.0, minimal-ui" />
    <title>Hermosawave Photography: Studio Prints</title>
        <!-- Typekit Asian Font Loader -->
<!-- 
font-family: ryo-gothic-plusn, sans-serif; (200, 400, 700)
-->
 <script>
  (function(d) {
    var config = {
      kitId: 'gwf6htn',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
      <link rel="stylesheet" href="/assets/css/styles.css">
      <style>
      .mainbody {
        background-color: rgb(104, 104, 104);
        color: white;
      }
      img.sampleprint {
        width: 60%;
      }
      #printselect {
        border: white, 1px, solid;
      }
      
      </style>

      <link href='https://hermosawavephotography.com/feed.xml' rel='alternate' type='application/atom+xml'>
      
      
      <!-- Favicon links -->
      <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      
      
      
  </head>
  <body>
      <div class="mainbody">
         
<nav>

    <div class="navitem">
    <a href="/" ><span class="hwp">hermosawave.photography</span></a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/latest/" >Latest Picture</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/about.html" >About</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/thumbnails/" >Thumbnails</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/categories/" >Locations</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/emptykyoto/" >Empty&nbsp;Kyoto</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/calendar/" >2025&nbsp;Calendar</a>&nbsp;&nbsp;
    </div>
  
</nav>

         
                <div class="topbody">
    <h1>Hermosawave Photography Studio Prints</h1>
    <!-- call it "Studio Prints" -->

    <div id="frontpageleft">
                <p class="en">
                <img class="matted" src="<?php echo $_GET['image']; ?>" >
            </p>
            <h3><strong><?php echo $_GET['title']; ?></strong></h3>
       <p class="en">
                   <?php 
                $_GET['date'];
               //  $formatteddate == $photodate("F j, Y, g:i a");  
                echo ($_GET['date'] . '  •  PictureCode: ' .  $_GET['picturecode']); ?>
             </p>
             

                  <form id="printselect" method="post" action="https://formspree.io/f/manenbqp">
                    <h3>Please select a size for your print:</h3>                      
                <p><select name="PrintSize" id="printsize" class="printsize">
                     <option value="INVALID: PLEASE GO BACK AND CHOOSE A PRINT SIZE">Please choose an option:</option>
                     <option value="Small Print">Small Print: $10.00 (5"x7", 2L size)</option>
                        <option value="Medium Print">Medium Print: $25.00 (A4, Letter size)</option>
                         <option value="Large Print">Large Print: $50.00 (A3+, Super B size)</option>
                       <option value="Custom">Custom (another size) </option>
            </select>
                </p>
               <p>Would you like it framed?<br/>
              <input type="radio" id="print" name="Frame?" value="Print Only">
              <label for="print">Print Only</label><br/>
             <input type="radio" id="frame" name="Frame?"  value="Frame and Mat" checked="checked"  >
             <label for="frame">Framed and Matted Print</label><br/>
             (A black metal frame with white mat is standard, as shown at top right)
             
               </p>
               
               <h3>Extra Cost Options:</h3>
               <p>
                 <input type="checkbox" name="Mat" value="Black Mat">
               <label for="Mat">Black Mat</label><br/>
               <input type="checkbox" name="FrameColor" value="White Frame">
                <label for="FrameColor">White Frame</label><br/>
               <input type="checkbox" name="FrameType" value="Wood Frame">
               <label for="FrameType">Wood Frame</label><br/>
               
               
               </p>
                            
             
                    <!-- carried over values -->
                    <input type="hidden" name="subject" value="Studio Photos Order Inquiry" />
                    <input type="hidden" id="product_id" name="picturecode" value="<?php echo $_GET['picturecode']; ?>" />
                    <input type="hidden" id="image_url" name="image_url" value="<?php echo 'https://hermosawavephotography.com' .  $_GET['image']; ?>" />
                    <input type="hidden" id="description" name="Description" value="<?php echo $_GET['date'] . ': ' . $_GET['title']; ?>" />                     
                   
                
             <p>Include your name, email, and shipping country. I will respond with an invoice confirming all the details, that can be paid online.</p>
             
             <label for="name">Name:</label><br/>
             <input type="text" id="Name" name="Name" value="Name/お名前"><br/>
             <label for="email">Email:</label><br/>
              <input type="text" id="Email" name="Email" value="Email"><br/>
             <label for="name">Shipping Country:</label><br/>
             <input type="text" id="Country" name="Country" value="Country to ship to/国"><br/>
             
             <input class="printbutton" type="submit" value="Continue" />
                   
             </form>
            
     </div>

 <div id="frontpageright">
  <p>Prints are made to order by the artist, on Epson Velvet Fine Art paper. At left is an approximation of what the print will look like (the hermosawave photography watermark will not appear on the print).</p>
     
     <h2>Framed and Matted Prints:</h2>
     <p class="en">
      <img  class="sampleprint" src="/assets/images/printshop/2404_A7R08715_ai.jpg"/><br/>
      Shown: Standard print with white mat, in a black metal frame. The artist’s signature in pencil is visible on the print, inside the mat.
    </p>
    <ul>Framed Finished Sizes (approximate):          
        <li><strong>Small: </strong> 145x200mm / 5.75"x7.75" </li>
      <li><strong>Medium: </strong> 305x395mm / 12"x15.5" </li>
      <li><strong>Large: </strong> 445x600mm / 17.5"x24" </li>
    </ul>
  
  <h2>Print Only:</h2>
  <p class="en">
     <img class="sampleprint" src="/assets/images/printshop/2404_A7R08715_ai_sized.jpg"/><br/>
     Printed with a ~20mm / 1" border, and signed in the border by the artist.
   </p>
   <ul>Print Sizes:          
       <li><strong>Small: </strong> 127x178mm / 5"x7" (2L)</li>
     <li><strong>Medium: </strong> 210x297mm / 8.5"x11" (A4, LTR) </li>
     <li><strong>Large: </strong> 330x483mm / 13"x19" (A3+, Super B)</li>
   </ul>
  
  </div> <!-- end frontpageright -->
       
</div>

  
        
        <footer>
    <div class="footer1">
        
<nav>

    <div class="navitem">
    <a href="/" ><span class="hwp">hermosawave.photography</span></a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/latest/" >Latest Picture</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/about.html" >About</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/thumbnails/" >Thumbnails</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/categories/" >Locations</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/emptykyoto/" >Empty&nbsp;Kyoto</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/calendar/" >2025&nbsp;Calendar</a>&nbsp;&nbsp;
    </div>
  
</nav>

    </div>
    <div class="footer2"> 
   <a href="/architecture">/architecture</a><br/>      
     <a href="https://blog.hermosawavephotography.com/" target="_blank">Newsletter</a><br/> 
    <a href="https://dashboard.mailerlite.com/forms/836089/125972582202607076/share">Picture of the Day Daily Email</a> <br/>
       <a href="/picturecode/">PictureCode</a><br/>            
        
      </div> 

    <div class="footer3">
        
       Photography and design by Daniel Sofer <br/>
       Photos generally taken the day of posting; <br/>check the exposure info underneath for exact time.<br/>
          &copy;2002-2025 Hermosawave Photography<br/> <br/>
 ✉️ <a href="mailto:photoweb@hermosawavephotography.com">        photos@hermosawavephotography.com</a><br/>
    Mastodon: <a rel="me" href="https://famichiki.jp/@daniel">@famichiki.jp/@daniel</a><br/>
        BlueSky: <a rel="me" href="https://bsky.app/profile/hermosawavephotography.com">@hermosawavephotography.com</a><br/>
      Glass: <a href="https://glass.photo/hermosawave" target="_blank">@hermosawave</a><br/> 
       Pixelfed: <a rel="me" href="https://pixelfed.social/hermosawave">@pixelfed.social/@hermosawave</a><br/>
         Instagram: <a href="https://instagram.com/hermosawave.photography" target="_blank">@hermosawave.photography</a><br/>
      Threads: <a rel="me" href="https://www.threads.net/@hermosawave.photography">@hermosawave.photography</a><br/>
        Subscribe to my <a href="https://hermosawavephotography.com/feed.xml">RSS Feed</a><br/>
        <a href="/privacy/">Privacy Policy</a>   <br/>
                  
    </div>
</footer>
      </div>
  </body>
</html>
