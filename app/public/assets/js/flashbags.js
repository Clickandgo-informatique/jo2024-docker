let flashbagQueue = [];
let isProcessing = false;

const icons = {
  success: "✅",
  error: "❌",
  warning: "⚠️",
  info: "ℹ️"
};

function showFlashbag(message, type = "info", duration = 4000, position = "top-right") {
  flashbagQueue.push({ message, type, duration, position });
  processQueue();
}

function processQueue() {
  if (isProcessing || flashbagQueue.length === 0) return;
  isProcessing = true;

  const { message, type, duration, position } = flashbagQueue.shift();
  let container = document.getElementById("flash-container");

  if (!container) {
    container = document.createElement("div");
    container.id = "flash-container";
    document.body.appendChild(container);
  }
  container.className = position;

  const flashbag = document.createElement("div");
  flashbag.className = `flashbag ${type}`;

  const icon = document.createElement("span");
  icon.className = "icon";
  icon.textContent = icons[type] || "ℹ️";

  const text = document.createElement("span");
  text.textContent = message;

  const closeBtn = document.createElement("button");
  closeBtn.className = "close-btn";
  closeBtn.innerHTML = "❌";
  closeBtn.onclick = () => removeFlashbag(flashbag);

  const progressBar = document.createElement("div");
  progressBar.className = "progress-bar";
  progressBar.style.animationDuration = duration + "ms";

  flashbag.appendChild(icon);
  flashbag.appendChild(text);
  flashbag.appendChild(closeBtn);
  flashbag.appendChild(progressBar);

  if (container.classList.contains("top-right") || container.classList.contains("top-left")) {
    container.prepend(flashbag);
  } else {
    container.appendChild(flashbag);
  }

  setTimeout(() => removeFlashbag(flashbag), duration);

  setTimeout(() => {
    isProcessing = false;
    processQueue();
  }, 400);
}

function removeFlashbag(flashbag) {
  flashbag.style.animation = "slideOut 0.4s forwards";
  setTimeout(() => flashbag.remove(), 400);
}

// On expose la fonction globalement
window.showFlashbag = showFlashbag;
