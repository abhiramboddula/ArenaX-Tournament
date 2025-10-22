from flask import Flask, request, jsonify, send_from_directory
import json
import os
from datetime import datetime

app = Flask(__name__)

# Data file for storing participants
DATA_FILE = 'participants.json'

def load_participants():
    if os.path.exists(DATA_FILE):
        with open(DATA_FILE, 'r') as f:
            return json.load(f)
    return []

def save_participants(participants):
    with open(DATA_FILE, 'w') as f:
        json.dump(participants, f, indent=2)

@app.route('/')
def index():
    return send_from_directory('.', 'index.html')

@app.route('/<path:filename>')
def serve_static(filename):
    return send_from_directory('.', filename)

@app.route('/api/participants/register', methods=['POST'])
def register_participant():
    data = request.json
    participants = load_participants()
    
    # Check if email already exists
    if any(p['email'] == data['email'] for p in participants):
        return jsonify({'error': 'Email already registered!'}), 400
    
    # Add new participant
    participant = {
        'id': str(datetime.now().timestamp()),
        'name': data['name'],
        'email': data['email'],
        'game': data['game'],
        'ign': data['ign'],
        'phone': data['phone'],
        'skillLevel': data['skillLevel'],
        'score': 0,
        'status': 'registered',
        'createdAt': datetime.now().isoformat()
    }
    
    participants.append(participant)
    save_participants(participants)
    
    return jsonify({'message': 'Registration successful!'})

@app.route('/api/participants/leaderboard')
def get_leaderboard():
    participants = load_participants()
    sorted_participants = sorted(participants, key=lambda x: x['score'], reverse=True)
    return jsonify(sorted_participants)

@app.route('/api/participants')
def get_participants():
    return jsonify(load_participants())

@app.route('/api/participants/update-score/<participant_id>', methods=['PUT'])
def update_score(participant_id):
    participants = load_participants()
    data = request.json
    
    for participant in participants:
        if participant['id'] == participant_id:
            participant['score'] = data['score']
            save_participants(participants)
            return jsonify({'message': 'Score updated successfully', 'participant': participant})
    
    return jsonify({'error': 'Participant not found'}), 404

@app.route('/api/participants/<participant_id>', methods=['DELETE'])
def delete_participant(participant_id):
    participants = load_participants()
    participants = [p for p in participants if p['id'] != participant_id]
    save_participants(participants)
    return jsonify({'message': 'Participant deleted successfully'})

if __name__ == '__main__':
    app.run(debug=True, port=5000)
