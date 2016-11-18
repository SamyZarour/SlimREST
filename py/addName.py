#!/usr/bin/python
# -*- coding: UTF-8 -*-

# Import modules for CGI handling
import sys
import json

result = {'success' : 'true', 'message' : 'The Command Completed Successfully'}

# Listening for post request from client
myjson = json.load(sys.stdin)

# Extract name from json
userName = myjson['userName']

# Write name into file
with open('name.log', 'a') as outfile:
	outfile.write("%s\n" % userName)

# Send response
print 'Content-Type: application/json\n\n'
print json.dumps(result)    # or "json.dump(result, sys.stdout)"
