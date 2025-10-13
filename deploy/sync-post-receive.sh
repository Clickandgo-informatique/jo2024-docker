#!/bin/bash

# Chemin vers le script local versionné
LOCAL_SCRIPT="deploy/post-receive-template.sh"

# Chemin distant vers le dépôt bare sur OVH
REMOTE_USER="ton-utilisateur-ovh"
REMOTE_HOST="ftp.clusterXXX.ovh.net"
REMOTE_PATH="/home/ton-utilisateur-ovh/repo.git/hooks/post-receive"

# Copie du script vers OVH
echo "Synchronisation du post-receive vers OVH..."
scp "$LOCAL_SCRIPT" "$REMOTE_USER@$REMOTE_HOST:$REMOTE_PATH"

# Confirmation
if [ $? -eq 0 ]; then
    echo "✅ Script post-receive synchronisé avec succès."
else
    echo "❌ Échec de la synchronisation."
fi
