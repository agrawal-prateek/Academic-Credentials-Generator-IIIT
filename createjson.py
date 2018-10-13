import csv
import json
import sys

degree = sys.argv[1]
csvfile = open(sys.argv[2], 'r')
outputjson = ''
if sys.argv[3] == 'data/mtechan.json':
    outputjson = 'data/mtech(an).json'
elif sys.argv[3] == 'data/mtechdc.json':
    outputjson = 'data/mtech(dc).json'
elif sys.argv[3] == 'data/mtechis.json':
    outputjson = 'data/mtech(is).json'
elif sys.argv[3] == 'data/mtechvlsi.json':
    outputjson = 'data/mtech(vlsi).json'
else:
    outputjson = sys.argv[3]
jsonfile = open(outputjson, 'w')

if degree == 'phd':
    reader = csv.DictReader(csvfile, ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'])
    jsondata = list(reader)
    jsonfile.write(json.dumps(jsondata))
    jsonfile.close()
    csvfile.close()
else:
    reader = csv.DictReader(csvfile, ['a', 'b', 'c', 'd'])
    jsondata = list(reader)
    startyear = sys.argv[4]
    endyear = sys.argv[5]
    finaljsondata = {"start_year": int(startyear), "end_year": int(endyear), "data": jsondata}
    jsonfile.write(json.dumps(finaljsondata))
    jsonfile.close()
    csvfile.close()

datafile = open(outputjson, 'r')
data = datafile.read()
datafile.close()
datafile = open(outputjson, 'w')
newdata = ''
i = 0
while i < len(data):
    if data[i:i + 6] == '\\ufffd':
        i += 6
        continue
    newdata += data[i]
    i += 1
datafile.write(newdata)
datafile.close()
