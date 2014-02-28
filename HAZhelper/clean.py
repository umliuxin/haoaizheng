# -*- coding: utf-8 -*-
rfile=open('spy1.txt','rU')
data=rfile.readlines()
for line in data:
	string="array('"+line.strip("\n").split("\t")[0]+"','"+line.strip("\n").split("\t")[1].strip('\t').strip(' ')+"'),"
	print string
