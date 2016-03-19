import tweepy
import pymongo
from bson import json_util
import json

consumer_key = "FiVzo8paZb9O8NZrq9mJT2okT"
consumer_secret = "0xU0KQUCMFfz3lZwXPTNHbHXKWXriWZ46CwTl6j01fFpCpanZB"
access_token = "399661575-dGkd1N8ryt3hH7OB3WmntLRCx9orLOlkucGYwKCn"
access_token_secret = "PSC3rS7YG28vVHVqDCDb6rnSJBQwOtDEpdWZwtK6SNhNe"
# Authenticate twitter Api
auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)

api = tweepy.API(auth)
#made a cursor
c = tweepy.Cursor(api.search, q='ToiletAlert')
c.pages(15) # you can change it make get tweets

#Lets save the selected part of the tweets inot json
tweetJson = []
for tweet in c.items():
    if tweet.lang == 'en':
        createdAt = str(tweet.created_at)
        authorCreatedAt = str(tweet.author.created_at)
        tweetJson.append(
          {'tweetText':tweet.text,

          'tweetCreatedAt':createdAt,
          'authorName': tweet.author.name,
          })
#dump the data into json format
print json.dumps(tweetJson)
