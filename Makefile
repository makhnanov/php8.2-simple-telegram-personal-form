detach:
	docker compose down && docker compose up --build --force-recreate --remove-orphans --detach
up:
	docker compose up --build --force-recreate --remove-orphans
shell:
	docker compose run php8.2-template sh
down:
	docker compose down
