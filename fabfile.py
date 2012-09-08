#!/usr/bin/env python
# -*- coding: utf-8 -*-

from fabric.api import *
from fabric.colors import green


def test():
	puts(green("Rodando testes unitários"))
	local("cake test app All --stop-on-error")


def phpcs():
	folders = ['Controller', 'Model', 'View/Helper', 'Console/Command', 'Lib', 'Test']
	folders = " ".join(folders)

	puts(green("Validando código-fonte"), True)
	local("phpcs --standard=CakePHP -p --extensions=php " + folders)


def autocompile():
	local("watchmedo shell-command --patterns='*.less' --recursive --ignore-directories --command='fab compile'")


def compile():
	local("lessc -x webroot/css/estilo.less > webroot/css/estilo.css")
