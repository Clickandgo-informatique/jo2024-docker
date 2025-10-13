const scanResult = document.getElementById('scan-result');
const readerId = "reader";
let html5QrCode = null;

const csrfToken = '{{ csrf_token("verify_ticket") }}';
const verifyUrl = '{{ path("admin_tickets_verify") }}';

document.getElementById('start-scan').addEventListener('click', async () => {
  if (!html5QrCode) {
    html5QrCode = new Html5Qrcode(readerId);
  }
  // try get cameras
  try {
    const devices = await Html5Qrcode.getCameras();
    const cameraId = devices && devices.length ? devices[0].id : null;
    await html5QrCode.start(
      cameraId || { facingMode: "environment" },
      { fps: 10, qrbox: 250 },
      (decodedText, decodedResult) => {
        // success callback
        handleDecoded(decodedText);
        // stop after first read
        html5QrCode.stop().then(() => {
          document.getElementById('stop-scan').disabled = true;
        });
      },
      (errorMessage) => {
        // optional: show scan errors
        // console.log('QR error', errorMessage);
      }
    );
    document.getElementById('stop-scan').disabled = false;
  } catch (err) {
    console.error(err);
    scanResult.textContent = 'Impossible d\'accéder à la caméra : ' + err;
  }
});

document.getElementById('stop-scan').addEventListener('click', () => {
  if (html5QrCode) {
    html5QrCode.stop().then(() => {
      document.getElementById('stop-scan').disabled = true;
      scanResult.textContent = 'Scan arrêté.';
    });
  }
});

document.getElementById('manual-verify').addEventListener('click', () => {
  const key = document.getElementById('ticketKey').value.trim();
  if (!key) {
    scanResult.textContent = 'Colle un ticketKey.';
    return;
  }
  handleDecoded(key);
});

async function handleDecoded(decodedText) {
  scanResult.textContent = 'Vérification en cours...';
  try {
    const resp = await fetch(verifyUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json'
      },
      body: JSON.stringify({ ticketKey: decodedText })
    });

    const data = await resp.json();
    if (resp.ok) {
      scanResult.textContent = '✅ ' + data.message;
      // feedback visuel / sonore si tu veux
    } else {
      // afficher message d'erreur issu du serveur
      scanResult.textContent = '❌ ' + (data.message || 'Erreur');
    }
  } catch (e) {
    console.error(e);
    scanResult.textContent = 'Erreur réseau: ' + e.message;
  }
}