import random

# Lista de adivinanzas
adivinanzas = [
    {
        "pregunta": "Qué tiene llaves pero no puede abrir puertas?",
        "opciones": ["a) Un pájaro", "b) Un piano", "c) Un teléfono"],
        "respuesta": "b"
    },
    {
        "pregunta": "Tiene hojas, pero no es un libro; se mueve, pero no es un animal. ¿Qué es?",
        "opciones": ["a) Un árbol", "b) Un coche", "c) Un zapato"],
        "respuesta": "a"
    },
    {
        "pregunta": "Es redondo como una luna, pero no es el satélite de la Tierra. ¿Qué es?",
        "opciones": ["a) Una pelota", "b) Una rueda", "c) Una galleta"],
        "respuesta": "b"
    }
]

def adivinanza():
    # Selecciona dos adivinanzas aleatorias sin repeticiones
    adivinanza1, adivinanza2 = random.sample(adivinanzas, 2)

    puntuacion = 0

    for bucleAdivinanzas in [adivinanza1, adivinanza2]:
        print("\nAdivina la respuesta correcta:")
        print(bucleAdivinanzas["pregunta"])
        for opcion in bucleAdivinanzas["opciones"]:
            print(opcion)

        respuesta = input("Tu respuesta (a/b/c): ").lower()

        if respuesta == bucleAdivinanzas["respuesta"]:
            print("¡Correcto! La respuesta es correcta.")
            puntuacion += 10
        else:
            print("Respuesta incorrecta. La respuesta correcta es:", bucleAdivinanzas["respuesta"])
            puntuacion -= 5

    print("\nPuntuación final:", puntuacion)

if __name__ == "__main__":
    adivinanza()