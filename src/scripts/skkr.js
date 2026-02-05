document.addEventListener("DOMContentLoaded", () => {
  const footerIcon = document.getElementById("skkr-icon");

  footerIcon.innerHTML =
    '<style>#skkr-icon { cursor: pointer; }</style><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 64 64" fill="none"><path fill="currentColor" fill-rule="evenodd" d="M32 64c17.673 0 32-14.327 32-32C64 14.327 49.673 0 32 0 14.327 0 0 14.327 0 32c0 17.673 14.327 32 32 32Zm11.944-32.833a2.464 2.464 0 0 1-2.464 2.387h-.005a2.464 2.464 0 0 1-2.463-2.387 2.275 2.275 0 0 0-4.547 0l-.001.031v16.3l-.002.1a7.05 7.05 0 0 1-1.602 4.112c-1.214 1.46-3.105 2.47-5.666 2.47-2.564 0-4.452-1.014-5.641-2.517a6.883 6.883 0 0 1-1.459-4.165 2.464 2.464 0 1 1 4.929 0c0 .258.107.743.395 1.107.202.254.631.646 1.776.646 1.146 0 1.63-.396 1.877-.693.314-.377.444-.859.464-1.125V31.198l-.001-.03a2.275 2.275 0 0 0-4.548 0 2.465 2.465 0 0 1-2.463 2.386h-.005a2.464 2.464 0 0 1-2.463-2.387 2.275 2.275 0 0 0-4.547 0 2.465 2.465 0 0 1-2.464 2.387h-.002a2.464 2.464 0 0 1-2.464-2.483C10.67 19.318 20.225 9.82 31.999 9.82s21.33 9.498 21.421 21.25a2.464 2.464 0 0 1-2.464 2.484h-.002a2.464 2.464 0 0 1-2.463-2.387 2.275 2.275 0 0 0-4.547 0Z" clip-rule="evenodd"/></svg>';

  footerIcon.addEventListener("click", () => {
    createModal();
    console.log("clicked");
  });

  // Track usage
  const trackingPixel = new Image();
  trackingPixel.src =
    "/wp-content/themes/skkr_wp/track/track-script.php?rand=" + Math.random();

  async function createModal() {
    // Create modal elements
    // Track modal activation
    const activationPixel = new Image();
    activationPixel.src =
      "/wp-content/themes/skkr_wp/track/track-script.php?type=active&rand=" +
      Math.random();

    const skkrStyle = document.createElement("link");
    skkrStyle.rel = "stylesheet";
    skkrStyle.href = "/wp-content/themes/skkr_wp/dist/styles/main.css";
    document.head.appendChild(skkrStyle);

    // Modal
    const modal = document.createElement("div");
    modal.id = "sk-modal";
    modal.className =
      "modal sk-fixed sk-left-0 sk-top-0 sk-z-[9999] sk-flex sk-h-screen sk-w-screen sk-items-start sk-justify-center sk-overflow-hidden sk-bg-black/80";

    const modalContent = document.createElement("iframe");
    modalContent.src = "/wp-content/themes/skkr_wp/skkr.html";
    modalContent.className =
      "modal-content sk-relative sk-top-10 sk-h-full sk-max-h-[520px] sk-w-full sk-max-w-xl";

    // Append modal content to modal
    modal.appendChild(modalContent);

    // Append modal to the body
    document.body.appendChild(modal);

    // Close modal when clicking outside of modal content
    modal.addEventListener("click", (event) => {
      if (event.target === modal) {
        closeModal();
      }
    });

    function closeModal() {
      // Remove event listener to avoid memory leaks
      modal.removeEventListener("click", closeModal);

      // Remove the modal from the DOM
      document.body.removeChild(modal);
    }
  }
});
