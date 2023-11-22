import random

def jugar_piedra_papel_tijera():
    opciones = ["piedra", "papel", "tijera"]
    puntaje_usuario = 0
    puntaje_computadora = 0

    for _ in range(5):
        # Solicita la elección del usuario
        eleccion_usuario = input("Elige piedra, papel o tijera: ").lower()

        # Genera una elección aleatoria para la computadora
        eleccion_computadora = random.choice(opciones)

        print("Tú elegiste:", eleccion_usuario)
        print("La computadora eligió:", eleccion_computadora)

        # Determina el resultado del juego
        if eleccion_usuario == eleccion_computadora:
            print("Empate. Nadie gana esta ronda.")
        elif (eleccion_usuario == "piedra" and eleccion_computadora == "tijera") or \
             (eleccion_usuario == "papel" and eleccion_computadora == "piedra") or \
             (eleccion_usuario == "tijera" and eleccion_computadora == "papel"):
            print(f"¡Has ganado! {eleccion_usuario} gana a {eleccion_computadora}.")
            puntaje_usuario += 1
        else:
            print(f"La computadora gana. {eleccion_computadora} gana a {eleccion_usuario}.")
            puntaje_computadora += 1

    # Muestra el resultado final
    print("\nPuntaje final:")
    print(f"Tú: {puntaje_usuario} puntos")
    print(f"Computadora: {puntaje_computadora} puntos")

    if puntaje_usuario > puntaje_computadora:
        print("¡Has ganado el juego!")
    elif puntaje_usuario < puntaje_computadora:
        print("La computadora ha ganado el juego.")
    else:
        print("El juego termina en empate.")

if __name__ == "__main__":
    jugar_piedra_papel_tijera()
