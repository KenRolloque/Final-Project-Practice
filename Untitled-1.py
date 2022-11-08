from realhttp import *

http = RealHTTPClient()

url = "https://api.thingspeak.com/channels/1917506.json"

get_json = http.get(url)