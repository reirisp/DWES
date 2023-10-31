def suma(a, b):
    return a + b

def resta(a, b):
    return a - b

def multiplicacion(a, b):
    return a * b

def division(a, b):
    if b == 0:
        return "Error: No se puede dividir por 0"
    return a / b

if __name__ == "__main__":
    num1 = 30
    num2 = 10

    print("Suma:", suma(num1, num2))
    print("Resta:", resta(num1, num2))
    print("Multiplicación:", multiplicacion(num1, num2))
    print("División:", division(num1, num2))
