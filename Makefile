#!/bin/bash
help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

install-tools: ## Install vendor in tools directory
	composer install --working-dir=tools/

php-cs-fixer: ## Run php-cs-fixer over bundles and symfony/src
	tools/vendor/bin/php-cs-fixer fix symfony/src/ --rules=@Symfony
	tools/vendor/bin/php-cs-fixer fix bundles/ --rules=@Symfony
