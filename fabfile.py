#!/usr/bin/env python

from __future__ import with_statement
from fabric.api import *

def test():
	local("cake test app All --stop-on-error")

def phpcs():
	folders = ['Controller', 'Model', 'View/Helper', 'Console/Command', 'Lib', 'Test']
	folders = " ".join(folders)

	local("phpcs --standard=CakePHP -p " + folders)