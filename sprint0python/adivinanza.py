def adivinanza():
    puntuacion = 0
    
    # Primera adivinanza
    # Con print imprimos mensajes por pantalla
    print("Adivina la respuesta correcta:")
    print("Qué tiene llaves pero no puede abrir puertas?")
    print("a) Un pájaro")
    print("b) Un piano")
    print("c) Un teléfono")

    # Para que el usuario pueda introducir su opción
    respuesta = input("Tu respuesta (a/b/c): ").lower()
    
    # Creamos un if else para que si acierta muestre un mensaje y si falla muestre otro distinto
    if respuesta == "b":
        print("¡Correcto!")
        puntuacion += 10
    else:
        print("Respuesta incorrecta. La respuesta correcta es 'b) Un piano'.")
        puntuacion -= 5
    
    # Segunda adivinanza
    # Con print imprimos mensajes por pantalla
    print("\nAdivina la respuesta correcta:")
    print("Tiene hojas, pero no es un libro; se mueve, pero no es un animal. ¿Qué es?")
    print("a) Un árbol")
    print("b) Un coche")
    print("c) Un zapato")
    
    # Para que el usuario pueda introducir su opción
    respuesta = input("Tu respuesta (a/b/c): ").lower()
    
    # Creamos un if else para que si acierta muestre un mensaje y si falla muestre otro distinto
    if respuesta == "a":
        print("¡Correcto!")
        puntuacion += 10
    else:
        print("Respuesta incorrecta. La respuesta correcta es 'a) Un árbol'.")
        puntuacion -= 5
    
    # Tercera adivinanza
    # Con print imprimos mensajes por pantalla
    print("\nAdivina la respuesta correcta:")
    print("Es redondo como una luna, pero no es el satélite de la Tierra. ¿Qué es?")
    print("a) Una pelota")
    print("b) Una galleta")
    print("c) Una rueda")
    
    # Para que el usuario pueda introducir su opción
    respuesta = input("Tu respuesta (a/b/c): ").lower()
    
    # Creamos un if else para que si acierta muestre un mensaje y si falla muestre otro distinto
    if respuesta == "c":
        print("¡Correcto!")
        puntuacion += 10
    else:
        print("Respuesta incorrecta. La respuesta correcta es 'c) Una rueda'.")
        puntuacion -= 5

    # Muestra la puntuación final
    print("\nPuntuación final: ", puntuacion)

if __name__ == "__main__":
    adivinanza()