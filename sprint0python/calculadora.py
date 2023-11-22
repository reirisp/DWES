# Importa las funciones del archivo operaciones.py
from operaciones import suma, resta, multiplicacion, division

def calculadora():
    while True:
        try:
            # Solicita al usuario dos números
            num1 = float(input("Ingrese el primer número: "))
            num2 = float(input("Ingrese el segundo número: "))
        except ValueError:
            print("Error: Ingrese números válidos.")
            continue

        # Pide al usuario qué tipo de operación desea realizar
        operacion = input("¿Qué tipo de operación desea realizar? (+, -, *, /): ")

        if operacion == '+':
            resultado = suma(num1, num2)
        elif operacion == '-':
            resultado = resta(num1, num2)
        elif operacion == '*':
            resultado = multiplicacion(num1, num2)
        elif operacion == '/':
            if num2 == 0:
                print("Error: No se puede dividir por 0.")
                continue
            resultado = division(num1, num2)
        else:
            print("Operación no válida.")
            continue

        print("Resultado:", resultado)

        # Pregunta al usuario si quiere hacer más operaciones
        continuar = input("¿Desea realizar más operaciones? (s/n): ")
        if continuar.lower() != 's':
            break

if __name__ == "__main__":
    calculadora()
