#!/usr/bin/env python
# -*- coding: utf-8 -*-

from fabric.api import *
from fabric.colors import green

def test():
	green("Rodando testes unitários")
	local("cake test app All --stop-on-error")

def phpcs():
	folders = ['Controller', 'Model', 'View/Helper', 'Console/Command', 'Lib', 'Test']
	folders = " ".join(folders)

	puts(green("Validando código-fonte"), True)
	local("phpcs --standard=CakePHP -p --extensions=php " + folders)