<!doctype html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Rotating Images Gallery</title>
		<style>
			#gallery {width: 300px;height: 300px;overflow: hidden}
			#image-container img {display: inline}
		</style>
	</head>
	<body>
		<section>
			<h1>Rotating Images Gallery</h1>
			<div id="gallery"><!-- Gallery goes here --></div>
			<script type="text/javascript">
				/* Create array to store counter index */
				var images = new Array();
				
				/* Select handle of parent container for the image gallery.
				 * This will be the viewport of the image gallery set by the css style.
				 */
				var gallery = document.querySelector("#gallery");
				
				/* Create a new div to contain the images, 
				 * set the id attribute and append to the newly created div.
				 */
				var div = document.createElement("div");
				div.setAttribute("id","image-container");
				gallery.appendChild(div);
				
				/* Now that the newly created div element has
				 * been assigned an id name.  Select it based on
				 * its id.
				 */
				var image_container = document.querySelector("#image-container");
			
				/* Create a variable to be incremented by the 
				 * images width, which will be used to increment 
				 * total width of the div#image-container.
				 */
				var totalWidth = 0;
				
				/* Create this variable to be incremented by inFrame element.
				 * The value will be compared with the image_container element.
				 * If it is less than the image_container element then
				 * slide_width will be incremented by inFrame element width.
				 */
				var slide_width = 0;
				
				/* Set css styles image_container, must set css right style
				 * initially at 0.  If not set at 0 then first image will
				 * jump to second image instead of transitioning.
				 */
				image_container.style.position = "relative";
				image_container.style.transition = "right 0.3s ease-in-out";
				image_container.style.right = 0;
				
				/* Create counter, then push indexes into
				 * the array images.  This will be used to 
				 * reference individual images.
				 */
				for(var i = 0;i <= 5;i++){
					images.push(i);
				}
				
				/* Create counter to create new images dynamically based
				 * on the counter above.  First new image element, set it's src
				 * attribute with the image uri based on the counter. Then 
				 * append it to the image_container element.
				 */
				for(var j = 1;j < images.length;j++){
					var inFrame = document.createElement("img");
					inFrame.setAttribute("src","images/gallery/image_" + j + ".jpg");
					image_container.appendChild(inFrame);
					totalWidth += inFrame.clientWidth;
				}
				
				/* Get the total width of the image_container based off
				 * of how many images it has.
				 */
				image_container.style.width = totalWidth + "px";
				
				/* Slide the image_container over based 
				 * the width of the individual image width.
				 * Increment the slide_width by the inFrame width,
				 * if it is less than the total width of 
				 * container_image width then keep incrementing 
				 * it by the inFrame width.  If slide_width width
				 * is not less than container_image width then
				 * set slide_width to zero to start the slide over.
				 */
				function rotate_image(){
					slide_width += inFrame.clientWidth;
					if(slide_width < image_container.clientWidth){
						image_container.style.right = slide_width + "px";
					}else{
						slide_width = 0;
						image_container.style.right = 0 + "px";
					}
				}
				
				/* Initiate the image gallery */
				setInterval("rotate_image()",1000);
			</script>
		</section>
	</body>
</html> 