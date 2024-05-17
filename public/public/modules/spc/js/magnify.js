// const container = document.getElementById('container');
// const image = document.getElementById('image');
// const magnifier = document.getElementById('magnifier');

// container.addEventListener('mousemove', (e) => {
//   const containerRect = container.getBoundingClientRect();
//   const mouseX = e.clientX - containerRect.left;
//   const mouseY = e.clientY - containerRect.top;

//   const magnifierSize = 150; // Size of the magnifier
//   const imageSize = 300; // Size of the image

//   // Calculate the position of the magnifier
//   const magnifierX = mouseX - magnifierSize / 2;
//   const magnifierY = mouseY - magnifierSize / 2;

//   // Ensure the magnifier stays within the bounds of the container
//   const maxX = imageSize - magnifierSize;
//   const maxY = imageSize - magnifierSize;
//   const clampedX = Math.min(Math.max(magnifierX, 0), maxX);
//   const clampedY = Math.min(Math.max(magnifierY, 0), maxY);

//   // Update the magnifier's position and background image
//   magnifier.style.left = clampedX + 'px';
//   magnifier.style.top = clampedY + 'px';
//   magnifier.style.backgroundImage = `url('${image.src}')`;

//   // Calculate the background position to magnify the image
//   const backgroundX = -clampedX * (image.width / imageSize);
//   const backgroundY = -clampedY * (image.height / imageSize);
//   magnifier.style.backgroundPosition = `${backgroundX}px ${backgroundY}px`;

//   // Show the magnifier
//   magnifier.style.display = 'block';
// });

// container.addEventListener('mouseleave', () => {
//   // Hide the magnifier when the mouse leaves the container
//   magnifier.style.display = 'none';
// });

document.addEventListener('DOMContentLoaded', function () {
  const imgContElm = document.querySelector(".img-container");
  const imgElm = document.querySelector(".img-container img");
  // const ZOOM = 120;
  const ZOOM_SCALE = 1.6; 
  imgContElm.addEventListener('mouseenter', function () {
    // imgElm.style.width = ZOOM + '%';
    imgElm.style.transform = `scale(${ZOOM_SCALE})`;
  });

  imgContElm.addEventListener('mouseleave', function () {
    // imgElm.style.width = '100%';
    imgElm.style.transform = 'scale(1)';
  });

  imgContElm.addEventListener('mousemove', function (mouseEvent) {
    let obj = imgContElm;
    let obj_left = 0;
    let obj_top = 0; // Fix the variable name
    let xpos;
    let ypos;

    while (obj.offsetParent) {
      obj_left += obj.offsetLeft; // Fix the variable name
      obj_top += obj.offsetTop;
      obj = obj.offsetParent;
    }

    if (mouseEvent) {
      xpos = mouseEvent.pageX;
      ypos = mouseEvent.pageY;
    } else {
      xpos = window.event.x + document.body.scrollLeft - 2;
      ypos = window.event.y + document.body.scrollTop - 2; // Fix the variable name
    }

    xpos -= obj_left;
    ypos -= obj_top;
    const imgWidth = imgElm.clientWidth;
    const imgHeight = imgElm.clientHeight;

    imgElm.style.top = -(((imgHeight - this.clientHeight) * ypos) / this.clientHeight) + 'px';
    imgElm.style.left = -(((imgWidth - this.clientWidth) * xpos) / this.clientWidth) + 'px';
  });

  function changeHeight() {
    imgContElm.style.height = imgContElm.clientWidth + 'px';
  }
  changeHeight();

  window.addEventListener('resize', changeHeight);
})
