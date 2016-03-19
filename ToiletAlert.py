import webapp2
import tweepy
import pymongo
from bson import json_util
import json

class MainPage(webapp2.RequestHandler):
    def get(self):
        self.response.headers['Content-Type'] = 'text/plain'
        self.response.write('Welcome to Toilet Alert : Code For India 2016 - Social Innovation Hackathon - Monitoring Public Loos Analytics')

app = webapp2.WSGIApplication([
    ('/', MainPage),
], debug=True)
