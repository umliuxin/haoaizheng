# -*- coding: utf-8 -*-
rfile=open('spy.txt','rU')
data=rfile.readlines()
for line in data:
	string="array('"+line.strip("\n").split(",")[0]+"','"+line.strip("\n").split(",")[1].strip('\t').strip(' ')+"'),"
	print string
	 