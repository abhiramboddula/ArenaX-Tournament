# ArenaX Esports Tournament Management System

A comprehensive tournament management system for Free Fire and other esports tournaments with multiple backend options.

## 🚀 Quick Start (No Backend Required)

**Easiest Option - Pure Frontend:**
1. Open `index.html` in your web browser
2. That's it! Everything works with localStorage

## 🛠 Backend Options

### Option 1: Pure Frontend (Recommended for beginners)
- **No installation required**
- Uses browser localStorage
- Works offline
- Perfect for small tournaments

**How to run:**
```bash
# Just open index.html in your browser
open index.html
```

### Option 2: Python Flask
- **Easy to learn and deploy**
- JSON file storage
- Great for medium tournaments

**How to run:**
```bash
# Install Python dependencies
pip install -r requirements.txt

# Run the server
python app.py

# Open http://localhost:5000
```

### Option 3: PHP (Traditional Web Hosting)
- **Works on any web hosting**
- No database required
- JSON file storage

**How to run:**
```bash
# Start PHP built-in server
php -S localhost:8000

# Open http://localhost:8000
```

### Option 4: Node.js (Original)
- **Most features**
- MongoDB database
- Real-time updates

**How to run:**
```bash
# Install dependencies
npm install

# Start MongoDB (make sure it's running)
npm start

# Open http://localhost:5000
```

## 🎮 Features

### Core Features
- ✅ **Participant Registration** - Complete form with validation
- ✅ **Real-time Leaderboard** - Live rankings and scores
- ✅ **Tournament Brackets** - Visual bracket system
- ✅ **Admin Panel** - Manage participants and scores
- ✅ **Tournament Schedule** - Match timings and events

### Enhanced Features
- ✅ **Form Validation** - Client-side and server-side
- ✅ **Responsive Design** - Works on all devices
- ✅ **Auto-refresh** - Real-time updates
- ✅ **Score Management** - Update scores easily
- ✅ **Participant Management** - Add, update, delete
- ✅ **Skill Level Tracking** - Track player skills
- ✅ **Status Management** - Tournament status tracking

## 📁 File Structure

```
freefire-tournment/
├── index.html                 # Main entry point (Pure Frontend)
├── app.py                     # Python Flask backend
├── api.php                    # PHP backend
├── requirements.txt           # Python dependencies
├── frontend/                  # Frontend pages
│   ├── index.html
│   ├── leaderboard.html
│   ├── schedule.html
│   ├── admin.html
│   └── brackets.html
├── css/
│   └── style.css
├── js/
│   ├── script.js             # Main JavaScript (Pure Frontend)
│   ├── leaderboard.js
│   ├── admin.js
│   └── brackets.js
├── backend/                   # Node.js backend
│   ├── server.js
│   ├── models/
│   └── routes/
└── README.md
```

## 🎯 Which Option Should You Choose?

### For Beginners
- **Pure Frontend** - No setup, just open HTML file

### For Small Tournaments (1-50 participants)
- **Pure Frontend** or **PHP** - Simple and effective

### For Medium Tournaments (50-500 participants)
- **Python Flask** - Easy to deploy and maintain

### For Large Tournaments (500+ participants)
- **Node.js** - Full database support and real-time features

## 🔧 API Endpoints (All Backends)

- `POST /api/participants/register` - Register participant
- `GET /api/participants/leaderboard` - Get leaderboard
- `GET /api/participants` - Get all participants
- `PUT /api/participants/update-score/:id` - Update score
- `DELETE /api/participants/:id` - Delete participant

## 🌐 Deployment Options

### Pure Frontend
- Upload to any web hosting
- GitHub Pages
- Netlify
- Vercel

### Python Flask
- Heroku
- PythonAnywhere
- DigitalOcean
- AWS

### PHP
- Any shared hosting
- cPanel
- XAMPP/WAMP

### Node.js
- Heroku
- DigitalOcean
- AWS
- Vercel

## 🎮 Usage

### For Participants
1. **Register** - Fill out the registration form
2. **View Leaderboard** - Check your ranking
3. **View Schedule** - See upcoming matches
4. **View Brackets** - See tournament structure

### For Administrators
1. **Access Admin Panel** - Manage participants
2. **Update Scores** - Update scores after matches
3. **Delete Participants** - Remove if needed

## 🛡️ Data Storage

- **Pure Frontend**: Browser localStorage
- **Python Flask**: JSON file
- **PHP**: JSON file
- **Node.js**: MongoDB database

## 📱 Mobile Support

All versions are fully responsive and work on:
- Desktop computers
- Tablets
- Mobile phones
- All modern browsers

## 🤝 Contributing

1. Fork the repository
2. Choose your preferred backend
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📄 License

This project is licensed under the ISC License.

## 🆘 Support

- **Pure Frontend**: No support needed, just open HTML
- **Python Flask**: Check Flask documentation
- **PHP**: Check PHP documentation
- **Node.js**: Check Node.js and MongoDB documentation

## 🎉 Ready to Host Your Tournament?

Choose your preferred option and start hosting amazing esports tournaments!